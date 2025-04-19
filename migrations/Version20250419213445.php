<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250419213445 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE player_npc (id SERIAL NOT NULL, player_id INT NOT NULL, npc_id INT NOT NULL, fortune INT NOT NULL, reputation INT NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_3BAD370F99E6F5DF ON player_npc (player_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_3BAD370FCA7D6B89 ON player_npc (npc_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_npc ADD CONSTRAINT FK_3BAD370F99E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_npc ADD CONSTRAINT FK_3BAD370FCA7D6B89 FOREIGN KEY (npc_id) REFERENCES npc (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_npc DROP CONSTRAINT FK_3BAD370F99E6F5DF
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_npc DROP CONSTRAINT FK_3BAD370FCA7D6B89
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE player_npc
        SQL);
    }
}
