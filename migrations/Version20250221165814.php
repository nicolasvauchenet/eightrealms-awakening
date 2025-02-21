<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250221165814 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE creature_item (id SERIAL NOT NULL, creature_id INT NOT NULL, item_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_85B74A93F9AB048 ON creature_item (creature_id)');
        $this->addSql('CREATE INDEX IDX_85B74A93126F525E ON creature_item (item_id)');
        $this->addSql('ALTER TABLE creature_item ADD CONSTRAINT FK_85B74A93F9AB048 FOREIGN KEY (creature_id) REFERENCES creature (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE creature_item ADD CONSTRAINT FK_85B74A93126F525E FOREIGN KEY (item_id) REFERENCES item (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE creature_item DROP CONSTRAINT FK_85B74A93F9AB048');
        $this->addSql('ALTER TABLE creature_item DROP CONSTRAINT FK_85B74A93126F525E');
        $this->addSql('DROP TABLE creature_item');
    }
}
