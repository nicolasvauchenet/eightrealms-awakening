<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250523202017 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE riddle_choice ADD next_riddle_question_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE riddle_choice ADD CONSTRAINT FK_DF8E26647507FCB5 FOREIGN KEY (next_riddle_question_id) REFERENCES riddle_question (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_DF8E26647507FCB5 ON riddle_choice (next_riddle_question_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE riddle_choice DROP CONSTRAINT FK_DF8E26647507FCB5
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_DF8E26647507FCB5
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE riddle_choice DROP next_riddle_question_id
        SQL);
    }
}
