<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241223202404 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE player_npc (id SERIAL NOT NULL, health INT DEFAULT NULL, mana INT DEFAULT NULL, crown_reward INT DEFAULT NULL, xp_reward INT DEFAULT NULL, player_id INT NOT NULL, npc_id INT NOT NULL, scene_id INT NOT NULL, fortune INT NOT NULL, alive BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_3BAD370F99E6F5DF ON player_npc (player_id)');
        $this->addSql('CREATE INDEX IDX_3BAD370FCA7D6B89 ON player_npc (npc_id)');
        $this->addSql('CREATE INDEX IDX_3BAD370F166053B4 ON player_npc (scene_id)');
        $this->addSql('ALTER TABLE player_npc ADD CONSTRAINT FK_3BAD370F99E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE player_npc ADD CONSTRAINT FK_3BAD370FCA7D6B89 FOREIGN KEY (npc_id) REFERENCES npc (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE player_npc ADD CONSTRAINT FK_3BAD370F166053B4 FOREIGN KEY (scene_id) REFERENCES scene (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE player_npc DROP CONSTRAINT FK_3BAD370F99E6F5DF');
        $this->addSql('ALTER TABLE player_npc DROP CONSTRAINT FK_3BAD370FCA7D6B89');
        $this->addSql('ALTER TABLE player_npc DROP CONSTRAINT FK_3BAD370F166053B4');
        $this->addSql('DROP TABLE player_npc');
    }
}
