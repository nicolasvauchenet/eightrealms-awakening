<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241220165103 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cinematic_scene (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE place_scene (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE cinematic_scene ADD CONSTRAINT FK_7DACF847BF396750 FOREIGN KEY (id) REFERENCES scene (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE place_scene ADD CONSTRAINT FK_700FF4F9BF396750 FOREIGN KEY (id) REFERENCES scene (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE cinematic_scene DROP CONSTRAINT FK_7DACF847BF396750');
        $this->addSql('ALTER TABLE place_scene DROP CONSTRAINT FK_700FF4F9BF396750');
        $this->addSql('DROP TABLE cinematic_scene');
        $this->addSql('DROP TABLE place_scene');
    }
}
