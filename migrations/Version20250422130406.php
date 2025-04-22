<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250422130406 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE quest_step (id SERIAL NOT NULL, quest_id INT NOT NULL, description TEXT NOT NULL, position INT NOT NULL, last BOOLEAN NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_4DB352CE209E9EF4 ON quest_step (quest_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE quest_step ADD CONSTRAINT FK_4DB352CE209E9EF4 FOREIGN KEY (quest_id) REFERENCES quest (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE quest_step DROP CONSTRAINT FK_4DB352CE209E9EF4
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE quest_step
        SQL);
    }
}
