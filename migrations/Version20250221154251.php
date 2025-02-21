<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250221154251 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cinematic_screen (id INT NOT NULL, picture VARCHAR(255) DEFAULT NULL, description TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE cinematic_screen ADD CONSTRAINT FK_51565BDEBF396750 FOREIGN KEY (id) REFERENCES screen (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE cinematic_screen DROP CONSTRAINT FK_51565BDEBF396750');
        $this->addSql('DROP TABLE cinematic_screen');
    }
}
