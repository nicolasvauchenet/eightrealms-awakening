<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241222162555 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE place DROP CONSTRAINT fk_741d53cd53c55f64');
        $this->addSql('DROP INDEX uniq_741d53cd53c55f64');
        $this->addSql('ALTER TABLE place DROP map_id');
        $this->addSql('ALTER TABLE profession ADD base_reputation INT NOT NULL');
        $this->addSql('ALTER TABLE race ADD base_reputation INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE race DROP base_reputation');
        $this->addSql('ALTER TABLE profession DROP base_reputation');
        $this->addSql('ALTER TABLE place ADD map_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT fk_741d53cd53c55f64 FOREIGN KEY (map_id) REFERENCES misc (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX uniq_741d53cd53c55f64 ON place (map_id)');
    }
}
