<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250422145243 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE location_screen (id INT NOT NULL, location_id INT NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_943EE93264D218E ON location_screen (location_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE location_screen ADD CONSTRAINT FK_943EE93264D218E FOREIGN KEY (location_id) REFERENCES location (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE location_screen ADD CONSTRAINT FK_943EE932BF396750 FOREIGN KEY (id) REFERENCES screen (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE location_screen DROP CONSTRAINT FK_943EE93264D218E
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE location_screen DROP CONSTRAINT FK_943EE932BF396750
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE location_screen
        SQL);
    }
}
