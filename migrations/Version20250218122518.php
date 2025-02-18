<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250218122518 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE armor (id INT NOT NULL, defense INT NOT NULL, price INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE armor ADD CONSTRAINT FK_BF27FEFCBF396750 FOREIGN KEY (id) REFERENCES item (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE armor DROP CONSTRAINT FK_BF27FEFCBF396750');
        $this->addSql('DROP TABLE armor');
    }
}
