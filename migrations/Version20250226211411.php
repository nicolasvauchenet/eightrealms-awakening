<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250226211411 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE player_npc_item (id SERIAL NOT NULL, player_npc_id INT NOT NULL, item_id INT NOT NULL, equipped BOOLEAN NOT NULL, health INT DEFAULT NULL, charge INT DEFAULT NULL, slot VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_408023C7557DFD57 ON player_npc_item (player_npc_id)');
        $this->addSql('CREATE INDEX IDX_408023C7126F525E ON player_npc_item (item_id)');
        $this->addSql('ALTER TABLE player_npc_item ADD CONSTRAINT FK_408023C7557DFD57 FOREIGN KEY (player_npc_id) REFERENCES player_npc (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE player_npc_item ADD CONSTRAINT FK_408023C7126F525E FOREIGN KEY (item_id) REFERENCES item (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE item_armor ALTER health DROP NOT NULL');
        $this->addSql('ALTER TABLE item_shield ALTER health DROP NOT NULL');
        $this->addSql('ALTER TABLE item_weapon ALTER health DROP NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE player_npc_item DROP CONSTRAINT FK_408023C7557DFD57');
        $this->addSql('ALTER TABLE player_npc_item DROP CONSTRAINT FK_408023C7126F525E');
        $this->addSql('DROP TABLE player_npc_item');
        $this->addSql('ALTER TABLE "item_weapon" ALTER health SET NOT NULL');
        $this->addSql('ALTER TABLE "item_shield" ALTER health SET NOT NULL');
        $this->addSql('ALTER TABLE "item_armor" ALTER health SET NOT NULL');
    }
}
