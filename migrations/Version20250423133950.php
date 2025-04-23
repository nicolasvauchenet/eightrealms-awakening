<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250423133950 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE dialog (id SERIAL NOT NULL, character_id INT NOT NULL, type VARCHAR(255) NOT NULL, conditions JSON DEFAULT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_4561D8621136BE75 ON dialog (character_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE dialog ADD CONSTRAINT FK_4561D8621136BE75 FOREIGN KEY (character_id) REFERENCES character (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE dialog DROP CONSTRAINT FK_4561D8621136BE75
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE dialog
        SQL);
    }
}
