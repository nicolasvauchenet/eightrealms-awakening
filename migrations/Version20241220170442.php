<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241220170442 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE transition_action (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE transition_action ADD CONSTRAINT FK_8EF2CA52BF396750 FOREIGN KEY (id) REFERENCES action (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE transition_action DROP CONSTRAINT FK_8EF2CA52BF396750');
        $this->addSql('DROP TABLE transition_action');
    }
}