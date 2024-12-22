<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241222202402 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE character_quest (id SERIAL NOT NULL, character_id INT NOT NULL, quest_id INT NOT NULL, start_location_id INT NOT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_BDD41F751136BE75 ON character_quest (character_id)');
        $this->addSql('CREATE INDEX IDX_BDD41F75209E9EF4 ON character_quest (quest_id)');
        $this->addSql('CREATE INDEX IDX_BDD41F755C3A313A ON character_quest (start_location_id)');
        $this->addSql('CREATE TABLE character_quest_step (id SERIAL NOT NULL, character_id INT NOT NULL, quest_step_id INT NOT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FC3FEB481136BE75 ON character_quest_step (character_id)');
        $this->addSql('CREATE INDEX IDX_FC3FEB482795A3D7 ON character_quest_step (quest_step_id)');
        $this->addSql('ALTER TABLE character_quest ADD CONSTRAINT FK_BDD41F751136BE75 FOREIGN KEY (character_id) REFERENCES player (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE character_quest ADD CONSTRAINT FK_BDD41F75209E9EF4 FOREIGN KEY (quest_id) REFERENCES quest (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE character_quest ADD CONSTRAINT FK_BDD41F755C3A313A FOREIGN KEY (start_location_id) REFERENCES location (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE character_quest_step ADD CONSTRAINT FK_FC3FEB481136BE75 FOREIGN KEY (character_id) REFERENCES character (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE character_quest_step ADD CONSTRAINT FK_FC3FEB482795A3D7 FOREIGN KEY (quest_step_id) REFERENCES quest_step (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE character_quest DROP CONSTRAINT FK_BDD41F751136BE75');
        $this->addSql('ALTER TABLE character_quest DROP CONSTRAINT FK_BDD41F75209E9EF4');
        $this->addSql('ALTER TABLE character_quest DROP CONSTRAINT FK_BDD41F755C3A313A');
        $this->addSql('ALTER TABLE character_quest_step DROP CONSTRAINT FK_FC3FEB481136BE75');
        $this->addSql('ALTER TABLE character_quest_step DROP CONSTRAINT FK_FC3FEB482795A3D7');
        $this->addSql('DROP TABLE character_quest');
        $this->addSql('DROP TABLE character_quest_step');
    }
}
