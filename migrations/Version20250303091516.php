<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250303091516 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE player_combat (id SERIAL NOT NULL, combat_id INT NOT NULL, player_id INT NOT NULL, status VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_12517546FC7EEDB8 ON player_combat (combat_id)');
        $this->addSql('CREATE INDEX IDX_1251754699E6F5DF ON player_combat (player_id)');
        $this->addSql('COMMENT ON COLUMN player_combat.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN player_combat.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE player_combat ADD CONSTRAINT FK_12517546FC7EEDB8 FOREIGN KEY (combat_id) REFERENCES combat (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE player_combat ADD CONSTRAINT FK_1251754699E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE player_combat DROP CONSTRAINT FK_12517546FC7EEDB8');
        $this->addSql('ALTER TABLE player_combat DROP CONSTRAINT FK_1251754699E6F5DF');
        $this->addSql('DROP TABLE player_combat');
    }
}
