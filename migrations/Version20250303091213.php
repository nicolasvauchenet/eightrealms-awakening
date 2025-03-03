<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250303091213 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE creature_combat (id SERIAL NOT NULL, combat_id INT NOT NULL, creature_id INT NOT NULL, health INT NOT NULL, mana INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_DE71E3FBFC7EEDB8 ON creature_combat (combat_id)');
        $this->addSql('CREATE INDEX IDX_DE71E3FBF9AB048 ON creature_combat (creature_id)');
        $this->addSql('ALTER TABLE creature_combat ADD CONSTRAINT FK_DE71E3FBFC7EEDB8 FOREIGN KEY (combat_id) REFERENCES combat (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE creature_combat ADD CONSTRAINT FK_DE71E3FBF9AB048 FOREIGN KEY (creature_id) REFERENCES creature (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE creature_combat DROP CONSTRAINT FK_DE71E3FBFC7EEDB8');
        $this->addSql('ALTER TABLE creature_combat DROP CONSTRAINT FK_DE71E3FBF9AB048');
        $this->addSql('DROP TABLE creature_combat');
    }
}
