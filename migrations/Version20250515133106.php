<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250515133106 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE riddle_trigger (id SERIAL NOT NULL, riddle_id INT NOT NULL, type VARCHAR(255) NOT NULL, payload JSON NOT NULL, conditions JSON DEFAULT NULL, action VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_4EAB7D08D25EE088 ON riddle_trigger (riddle_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE riddle_trigger ADD CONSTRAINT FK_4EAB7D08D25EE088 FOREIGN KEY (riddle_id) REFERENCES riddle (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE riddle_trigger DROP CONSTRAINT FK_4EAB7D08D25EE088
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE riddle_trigger
        SQL);
    }
}
