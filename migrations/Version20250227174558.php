<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250227174558 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE dialogue (id SERIAL NOT NULL, parent_id INT DEFAULT NULL, npc_id INT NOT NULL, type VARCHAR(255) NOT NULL, text TEXT NOT NULL, conditions JSON DEFAULT NULL, effects JSON DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4561D862727ACA70 ON dialogue (parent_id)');
        $this->addSql('CREATE INDEX IDX_4561D862CA7D6B89 ON dialogue (npc_id)');
        $this->addSql('ALTER TABLE dialogue ADD CONSTRAINT FK_4561D862727ACA70 FOREIGN KEY (parent_id) REFERENCES dialogue (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE dialogue ADD CONSTRAINT FK_4561D862CA7D6B89 FOREIGN KEY (npc_id) REFERENCES npc (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE dialogue DROP CONSTRAINT FK_4561D862727ACA70');
        $this->addSql('ALTER TABLE dialogue DROP CONSTRAINT FK_4561D862CA7D6B89');
        $this->addSql('DROP TABLE dialogue');
    }
}
