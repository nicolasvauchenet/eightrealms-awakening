<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250508175050 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE player_quest_step ADD player_quest_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_quest_step ADD CONSTRAINT FK_1216D6F32649DF14 FOREIGN KEY (player_quest_id) REFERENCES player_quest (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_1216D6F32649DF14 ON player_quest_step (player_quest_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_quest_step DROP CONSTRAINT FK_1216D6F32649DF14
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_1216D6F32649DF14
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_quest_step DROP player_quest_id
        SQL);
    }
}
