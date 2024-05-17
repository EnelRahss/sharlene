<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240516071636 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE followup ADD housing_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE followup ADD CONSTRAINT FK_1D1A7A3BAD5873E3 FOREIGN KEY (housing_id) REFERENCES housing (id)');
        $this->addSql('CREATE INDEX IDX_1D1A7A3BAD5873E3 ON followup (housing_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE followup DROP FOREIGN KEY FK_1D1A7A3BAD5873E3');
        $this->addSql('DROP INDEX IDX_1D1A7A3BAD5873E3 ON followup');
        $this->addSql('ALTER TABLE followup DROP housing_id');
    }
}
