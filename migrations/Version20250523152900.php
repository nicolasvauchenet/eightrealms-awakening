<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250523152900 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE riddle_choice (id SERIAL NOT NULL, riddle_question_id INT NOT NULL, position INT NOT NULL, text TEXT NOT NULL, marker VARCHAR(255) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_DF8E2664127DF7B2 ON riddle_choice (riddle_question_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE riddle_choice ADD CONSTRAINT FK_DF8E2664127DF7B2 FOREIGN KEY (riddle_question_id) REFERENCES riddle_question (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE riddle_choice DROP CONSTRAINT FK_DF8E2664127DF7B2
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE riddle_choice
        SQL);
    }
}
