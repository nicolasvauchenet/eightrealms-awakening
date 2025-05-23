<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250523182910 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE riddle_screen (id INT NOT NULL, riddle_question_id INT NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_C1691DC6127DF7B2 ON riddle_screen (riddle_question_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE riddle_screen ADD CONSTRAINT FK_C1691DC6127DF7B2 FOREIGN KEY (riddle_question_id) REFERENCES riddle_question (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE riddle_screen ADD CONSTRAINT FK_C1691DC6BF396750 FOREIGN KEY (id) REFERENCES screen (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE riddle_screen DROP CONSTRAINT FK_C1691DC6127DF7B2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE riddle_screen DROP CONSTRAINT FK_C1691DC6BF396750
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE riddle_screen
        SQL);
    }
}
