<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250523152438 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE player_alignment (id SERIAL NOT NULL, player_id INT NOT NULL, alignment_id INT NOT NULL, marker_counts JSON DEFAULT NULL, dominant_marker VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_8CC22B6599E6F5DF ON player_alignment (player_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_8CC22B65AB7AC2A0 ON player_alignment (alignment_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_alignment ADD CONSTRAINT FK_8CC22B6599E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_alignment ADD CONSTRAINT FK_8CC22B65AB7AC2A0 FOREIGN KEY (alignment_id) REFERENCES alignment (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_alignment DROP CONSTRAINT FK_8CC22B6599E6F5DF
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_alignment DROP CONSTRAINT FK_8CC22B65AB7AC2A0
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE player_alignment
        SQL);
    }
}
