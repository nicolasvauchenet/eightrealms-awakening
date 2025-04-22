<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250422131428 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE player_quest_step (id SERIAL NOT NULL, player_id INT NOT NULL, quest_step_id INT NOT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_1216D6F399E6F5DF ON player_quest_step (player_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_1216D6F32795A3D7 ON player_quest_step (quest_step_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_quest_step ADD CONSTRAINT FK_1216D6F399E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_quest_step ADD CONSTRAINT FK_1216D6F32795A3D7 FOREIGN KEY (quest_step_id) REFERENCES quest_step (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_quest_step DROP CONSTRAINT FK_1216D6F399E6F5DF
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_quest_step DROP CONSTRAINT FK_1216D6F32795A3D7
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE player_quest_step
        SQL);
    }
}
