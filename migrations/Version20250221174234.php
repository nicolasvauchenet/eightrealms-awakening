<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250221174234 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE step (id SERIAL NOT NULL, quest_id INT NOT NULL, position INT NOT NULL, description TEXT NOT NULL, reward JSON DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_43B9FE3C209E9EF4 ON step (quest_id)');
        $this->addSql('ALTER TABLE step ADD CONSTRAINT FK_43B9FE3C209E9EF4 FOREIGN KEY (quest_id) REFERENCES quest (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE step DROP CONSTRAINT FK_43B9FE3C209E9EF4');
        $this->addSql('DROP TABLE step');
    }
}
