<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250218141423 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE character_item (id SERIAL NOT NULL, character_id INT NOT NULL, item_id INT NOT NULL, equipped BOOLEAN NOT NULL, health INT DEFAULT NULL, charge INT DEFAULT NULL, slot VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8E731861136BE75 ON character_item (character_id)');
        $this->addSql('CREATE INDEX IDX_8E73186126F525E ON character_item (item_id)');
        $this->addSql('ALTER TABLE character_item ADD CONSTRAINT FK_8E731861136BE75 FOREIGN KEY (character_id) REFERENCES character (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE character_item ADD CONSTRAINT FK_8E73186126F525E FOREIGN KEY (item_id) REFERENCES item (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE character_item DROP CONSTRAINT FK_8E731861136BE75');
        $this->addSql('ALTER TABLE character_item DROP CONSTRAINT FK_8E73186126F525E');
        $this->addSql('DROP TABLE character_item');
    }
}
