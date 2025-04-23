<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250423213633 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE player_combat_enemy (id SERIAL NOT NULL, enemy_id INT NOT NULL, player_combat_id INT NOT NULL, health INT NOT NULL, mana INT NOT NULL, position INT NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_F5872F22900C982F ON player_combat_enemy (enemy_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_F5872F225C72D881 ON player_combat_enemy (player_combat_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_combat_enemy ADD CONSTRAINT FK_F5872F22900C982F FOREIGN KEY (enemy_id) REFERENCES character (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_combat_enemy ADD CONSTRAINT FK_F5872F225C72D881 FOREIGN KEY (player_combat_id) REFERENCES player_combat (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER INDEX idx_9759850900c982f RENAME TO IDX_75BA7F00900C982F
        SQL);
        $this->addSql(<<<'SQL'
            ALTER INDEX idx_9759850fc7eedb8 RENAME TO IDX_75BA7F00FC7EEDB8
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_combat ALTER updated_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE
        SQL);
        $this->addSql(<<<'SQL'
            COMMENT ON COLUMN player_combat.updated_at IS '(DC2Type:datetime_immutable)'
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_combat_enemy DROP CONSTRAINT FK_F5872F22900C982F
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_combat_enemy DROP CONSTRAINT FK_F5872F225C72D881
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE player_combat_enemy
        SQL);
        $this->addSql(<<<'SQL'
            ALTER INDEX idx_75ba7f00fc7eedb8 RENAME TO idx_9759850fc7eedb8
        SQL);
        $this->addSql(<<<'SQL'
            ALTER INDEX idx_75ba7f00900c982f RENAME TO idx_9759850900c982f
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_combat ALTER updated_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE
        SQL);
        $this->addSql(<<<'SQL'
            COMMENT ON COLUMN player_combat.updated_at IS NULL
        SQL);
    }
}
