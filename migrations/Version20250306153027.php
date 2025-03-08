<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250306153027 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE npc_player_combat (id SERIAL NOT NULL, player_combat_id INT NOT NULL, npc_id INT NOT NULL, health INT NOT NULL, mana INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1BB18E095C72D881 ON npc_player_combat (player_combat_id)');
        $this->addSql('CREATE INDEX IDX_1BB18E09CA7D6B89 ON npc_player_combat (npc_id)');
        $this->addSql('ALTER TABLE npc_player_combat ADD CONSTRAINT FK_1BB18E095C72D881 FOREIGN KEY (player_combat_id) REFERENCES player_combat (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE npc_player_combat ADD CONSTRAINT FK_1BB18E09CA7D6B89 FOREIGN KEY (npc_id) REFERENCES npc (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE npc_player_combat DROP CONSTRAINT FK_1BB18E095C72D881');
        $this->addSql('ALTER TABLE npc_player_combat DROP CONSTRAINT FK_1BB18E09CA7D6B89');
        $this->addSql('DROP TABLE npc_player_combat');
    }
}
