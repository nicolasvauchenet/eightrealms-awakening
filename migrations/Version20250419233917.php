<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250419233917 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE character_location (id SERIAL NOT NULL, character_id INT NOT NULL, location_id INT NOT NULL, conditions JSON DEFAULT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_69F605A1136BE75 ON character_location (character_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_69F605A64D218E ON character_location (location_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE character_location ADD CONSTRAINT FK_69F605A1136BE75 FOREIGN KEY (character_id) REFERENCES character (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE character_location ADD CONSTRAINT FK_69F605A64D218E FOREIGN KEY (location_id) REFERENCES location (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE character_location DROP CONSTRAINT FK_69F605A1136BE75
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE character_location DROP CONSTRAINT FK_69F605A64D218E
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE character_location
        SQL);
    }
}
