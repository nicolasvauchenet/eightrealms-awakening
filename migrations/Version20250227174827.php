<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250227174827 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE player_npc ADD last_dialogue_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE player_npc ADD CONSTRAINT FK_3BAD370F49891BE4 FOREIGN KEY (last_dialogue_id) REFERENCES dialogue (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_3BAD370F49891BE4 ON player_npc (last_dialogue_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE player_npc DROP CONSTRAINT FK_3BAD370F49891BE4');
        $this->addSql('DROP INDEX IDX_3BAD370F49891BE4');
        $this->addSql('ALTER TABLE player_npc DROP last_dialogue_id');
    }
}
