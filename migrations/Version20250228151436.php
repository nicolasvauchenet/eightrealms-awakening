<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250228151436 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE player_quest ADD quest_id INT NOT NULL');
        $this->addSql('ALTER TABLE player_quest ADD quest_status VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE player_quest ADD CONSTRAINT FK_FC658351209E9EF4 FOREIGN KEY (quest_id) REFERENCES quest (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_FC658351209E9EF4 ON player_quest (quest_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE player_quest DROP CONSTRAINT FK_FC658351209E9EF4');
        $this->addSql('DROP INDEX IDX_FC658351209E9EF4');
        $this->addSql('ALTER TABLE player_quest DROP quest_id');
        $this->addSql('ALTER TABLE player_quest DROP quest_status');
    }
}
