<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241222163258 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE character_location_reputation (id SERIAL NOT NULL, character_id INT NOT NULL, location_id INT NOT NULL, value INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_31E98F9D1136BE75 ON character_location_reputation (character_id)');
        $this->addSql('CREATE INDEX IDX_31E98F9D64D218E ON character_location_reputation (location_id)');
        $this->addSql('ALTER TABLE character_location_reputation ADD CONSTRAINT FK_31E98F9D1136BE75 FOREIGN KEY (character_id) REFERENCES character (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE character_location_reputation ADD CONSTRAINT FK_31E98F9D64D218E FOREIGN KEY (location_id) REFERENCES location (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE character_location_reputation DROP CONSTRAINT FK_31E98F9D1136BE75');
        $this->addSql('ALTER TABLE character_location_reputation DROP CONSTRAINT FK_31E98F9D64D218E');
        $this->addSql('DROP TABLE character_location_reputation');
    }
}
