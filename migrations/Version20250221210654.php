<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250221210654 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE action (id SERIAL NOT NULL, screen_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, picture VARCHAR(255) DEFAULT NULL, requirements JSON DEFAULT NULL, effects JSON DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_47CC8C9241A67722 ON action (screen_id)');
        $this->addSql('ALTER TABLE action ADD CONSTRAINT FK_47CC8C9241A67722 FOREIGN KEY (screen_id) REFERENCES screen (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE action DROP CONSTRAINT FK_47CC8C9241A67722');
        $this->addSql('DROP TABLE action');
    }
}
