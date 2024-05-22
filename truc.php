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
        $this->addSql('CREATE TABLE followup (
            id INT AUTO_INCREMENT NOT NULL, 
            cleaner_id INT DEFAULT NULL, 
            housing_id INT DEFAULT NULL, 
            title VARCHAR(255) DEFAULT NULL, 
            create_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', 
            status TINYINT(1) NOT NULL, 
            content VARCHAR(255) DEFAULT NULL, 
            price DOUBLE PRECISION DEFAULT NULL, 
            INDEX IDX_1D1A7A3BEDDDAE19 (cleaner_id), 
            INDEX IDX_1D1A7A3BAD5873E3 (housing_id), 
            PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE followup ADD CONSTRAINT FK_1D1A7A3BEDDDAE19 FOREIGN KEY (cleaner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE followup ADD CONSTRAINT FK_1D1A7A3BAD5873E3 FOREIGN KEY (housing_id) REFERENCES housing (id)');
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
