<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250422131317 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE player_quest (id SERIAL NOT NULL, player_id INT NOT NULL, quest_id INT NOT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_FC65835199E6F5DF ON player_quest (player_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_FC658351209E9EF4 ON player_quest (quest_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_quest ADD CONSTRAINT FK_FC65835199E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_quest ADD CONSTRAINT FK_FC658351209E9EF4 FOREIGN KEY (quest_id) REFERENCES quest (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_quest DROP CONSTRAINT FK_FC65835199E6F5DF
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_quest DROP CONSTRAINT FK_FC658351209E9EF4
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE player_quest
        SQL);
    }
}
