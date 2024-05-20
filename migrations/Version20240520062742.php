<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240520062742 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, number INT DEFAULT NULL, street VARCHAR(255) DEFAULT NULL, postcode INT DEFAULT NULL, city VARCHAR(50) DEFAULT NULL, additional VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE followup (id INT AUTO_INCREMENT NOT NULL, cleaner_id INT DEFAULT NULL, housing_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, create_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', status TINYINT(1) NOT NULL, content VARCHAR(255) DEFAULT NULL, price DOUBLE PRECISION DEFAULT NULL, INDEX IDX_1D1A7A3BEDDDAE19 (cleaner_id), INDEX IDX_1D1A7A3BAD5873E3 (housing_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE housing (id INT AUTO_INCREMENT NOT NULL, address_id INT DEFAULT NULL, owner_id INT DEFAULT NULL, surface INT DEFAULT NULL, url_rent VARCHAR(255) DEFAULT NULL, keybox TINYINT(1) NOT NULL, arrival_time DATETIME DEFAULT NULL, departure_time DATETIME DEFAULT NULL, name VARCHAR(50) NOT NULL, INDEX IDX_FB8142C3F5B7AF75 (address_id), INDEX IDX_FB8142C37E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, lastname VARCHAR(50) NOT NULL, firstname VARCHAR(50) NOT NULL, status TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE followup ADD CONSTRAINT FK_1D1A7A3BEDDDAE19 FOREIGN KEY (cleaner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE followup ADD CONSTRAINT FK_1D1A7A3BAD5873E3 FOREIGN KEY (housing_id) REFERENCES housing (id)');
        $this->addSql('ALTER TABLE housing ADD CONSTRAINT FK_FB8142C3F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE housing ADD CONSTRAINT FK_FB8142C37E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE followup DROP FOREIGN KEY FK_1D1A7A3BEDDDAE19');
        $this->addSql('ALTER TABLE followup DROP FOREIGN KEY FK_1D1A7A3BAD5873E3');
        $this->addSql('ALTER TABLE housing DROP FOREIGN KEY FK_FB8142C3F5B7AF75');
        $this->addSql('ALTER TABLE housing DROP FOREIGN KEY FK_FB8142C37E3C61F9');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE followup');
        $this->addSql('DROP TABLE housing');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
