<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250227174735 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE dialogue_choice (id SERIAL NOT NULL, dialogue_id INT NOT NULL, text TEXT NOT NULL, position INT NOT NULL, conditions JSON DEFAULT NULL, effects JSON DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D244886D5E46C4E2 ON dialogue_choice (dialogue_id)');
        $this->addSql('ALTER TABLE dialogue_choice ADD CONSTRAINT FK_D244886D5E46C4E2 FOREIGN KEY (dialogue_id) REFERENCES dialogue (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE dialogue_choice DROP CONSTRAINT FK_D244886D5E46C4E2');
        $this->addSql('DROP TABLE dialogue_choice');
    }
}
