<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250423184332 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE player_combat (id SERIAL NOT NULL, player_id INT NOT NULL, combat_id INT NOT NULL, status VARCHAR(255) NOT NULL, current_round INT NOT NULL, current_turn INT NOT NULL, turn_order JSON DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_1251754699E6F5DF ON player_combat (player_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_12517546FC7EEDB8 ON player_combat (combat_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_combat ADD CONSTRAINT FK_1251754699E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_combat ADD CONSTRAINT FK_12517546FC7EEDB8 FOREIGN KEY (combat_id) REFERENCES combat (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_combat DROP CONSTRAINT FK_1251754699E6F5DF
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_combat DROP CONSTRAINT FK_12517546FC7EEDB8
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE player_combat
        SQL);
    }
}
