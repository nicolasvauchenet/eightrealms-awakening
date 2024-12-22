<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241222140632 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE location ADD map_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CB53C55F64 FOREIGN KEY (map_id) REFERENCES misc (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5E9E89CB53C55F64 ON location (map_id)');
        $this->addSql('ALTER TABLE place ADD map_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CD53C55F64 FOREIGN KEY (map_id) REFERENCES misc (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_741D53CD53C55F64 ON place (map_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE place DROP CONSTRAINT FK_741D53CD53C55F64');
        $this->addSql('DROP INDEX UNIQ_741D53CD53C55F64');
        $this->addSql('ALTER TABLE place DROP map_id');
        $this->addSql('ALTER TABLE location DROP CONSTRAINT FK_5E9E89CB53C55F64');
        $this->addSql('DROP INDEX UNIQ_5E9E89CB53C55F64');
        $this->addSql('ALTER TABLE location DROP map_id');
    }
}
