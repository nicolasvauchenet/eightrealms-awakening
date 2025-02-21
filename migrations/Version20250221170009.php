<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250221170009 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE creature_location (id SERIAL NOT NULL, creature_id INT NOT NULL, location_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_104EE28FF9AB048 ON creature_location (creature_id)');
        $this->addSql('CREATE INDEX IDX_104EE28F64D218E ON creature_location (location_id)');
        $this->addSql('ALTER TABLE creature_location ADD CONSTRAINT FK_104EE28FF9AB048 FOREIGN KEY (creature_id) REFERENCES creature (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE creature_location ADD CONSTRAINT FK_104EE28F64D218E FOREIGN KEY (location_id) REFERENCES location (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE creature_location DROP CONSTRAINT FK_104EE28FF9AB048');
        $this->addSql('ALTER TABLE creature_location DROP CONSTRAINT FK_104EE28F64D218E');
        $this->addSql('DROP TABLE creature_location');
    }
}
