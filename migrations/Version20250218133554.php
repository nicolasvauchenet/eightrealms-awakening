<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250218133554 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE potion (id INT NOT NULL, target VARCHAR(255) DEFAULT NULL, effect VARCHAR(255) DEFAULT NULL, amount INT DEFAULT NULL, duration INT DEFAULT NULL, price INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE potion ADD CONSTRAINT FK_4AB6B0ADBF396750 FOREIGN KEY (id) REFERENCES item (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE potion DROP CONSTRAINT FK_4AB6B0ADBF396750');
        $this->addSql('DROP TABLE potion');
    }
}
