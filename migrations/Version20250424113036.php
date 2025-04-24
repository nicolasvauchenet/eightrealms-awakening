<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250424113036 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE player_combat_effect (id SERIAL NOT NULL, player_combat_id INT DEFAULT NULL, player_combat_enemy_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, target VARCHAR(255) NOT NULL, amount INT NOT NULL, duration INT DEFAULT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_CC04D32F5C72D881 ON player_combat_effect (player_combat_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_CC04D32F3C4879A5 ON player_combat_effect (player_combat_enemy_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_combat_effect ADD CONSTRAINT FK_CC04D32F5C72D881 FOREIGN KEY (player_combat_id) REFERENCES player_combat (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_combat_effect ADD CONSTRAINT FK_CC04D32F3C4879A5 FOREIGN KEY (player_combat_enemy_id) REFERENCES player_combat_enemy (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_combat_effect DROP CONSTRAINT FK_CC04D32F5C72D881
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_combat_effect DROP CONSTRAINT FK_CC04D32F3C4879A5
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE player_combat_effect
        SQL);
    }
}
