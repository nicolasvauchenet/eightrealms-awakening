<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250515133518 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE player_riddle (id SERIAL NOT NULL, player_id INT NOT NULL, riddle_id INT NOT NULL, solved BOOLEAN NOT NULL, success BOOLEAN NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_F3003C5F99E6F5DF ON player_riddle (player_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_F3003C5FD25EE088 ON player_riddle (riddle_id)
        SQL);
        $this->addSql(<<<'SQL'
            COMMENT ON COLUMN player_riddle.updated_at IS '(DC2Type:datetime_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_riddle ADD CONSTRAINT FK_F3003C5F99E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_riddle ADD CONSTRAINT FK_F3003C5FD25EE088 FOREIGN KEY (riddle_id) REFERENCES riddle (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_riddle DROP CONSTRAINT FK_F3003C5F99E6F5DF
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_riddle DROP CONSTRAINT FK_F3003C5FD25EE088
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE player_riddle
        SQL);
    }
}
