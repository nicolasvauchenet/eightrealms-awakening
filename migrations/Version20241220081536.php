<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241220081536 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE character_spell (id SERIAL NOT NULL, character_id INT NOT NULL, spell_id INT NOT NULL, level INT NOT NULL, amount_bonus INT DEFAULT NULL, duration_bonus INT DEFAULT NULL, area_bonus INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2EFC2AEF1136BE75 ON character_spell (character_id)');
        $this->addSql('CREATE INDEX IDX_2EFC2AEF479EC90D ON character_spell (spell_id)');
        $this->addSql('ALTER TABLE character_spell ADD CONSTRAINT FK_2EFC2AEF1136BE75 FOREIGN KEY (character_id) REFERENCES character (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE character_spell ADD CONSTRAINT FK_2EFC2AEF479EC90D FOREIGN KEY (spell_id) REFERENCES spell (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE character_spell DROP CONSTRAINT FK_2EFC2AEF1136BE75');
        $this->addSql('ALTER TABLE character_spell DROP CONSTRAINT FK_2EFC2AEF479EC90D');
        $this->addSql('DROP TABLE character_spell');
    }
}
