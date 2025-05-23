<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250523152738 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE riddle_question (id SERIAL NOT NULL, riddle_id INT NOT NULL, position INT NOT NULL, picture VARCHAR(255) DEFAULT NULL, text TEXT NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_ADA22C47D25EE088 ON riddle_question (riddle_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE riddle_question ADD CONSTRAINT FK_ADA22C47D25EE088 FOREIGN KEY (riddle_id) REFERENCES riddle (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE riddle_question DROP CONSTRAINT FK_ADA22C47D25EE088
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE riddle_question
        SQL);
    }
}
