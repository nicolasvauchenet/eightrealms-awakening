<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250221165531 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE creature (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, picture VARCHAR(255) NOT NULL, description TEXT NOT NULL, strength INT NOT NULL, dexterity INT NOT NULL, constitution INT NOT NULL, wisdom INT NOT NULL, intelligence INT NOT NULL, charisma INT NOT NULL, health_max INT NOT NULL, mana_max INT NOT NULL, fortune INT NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE creature');
    }
}
