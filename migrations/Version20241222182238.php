<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241222182238 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE quest_step (id SERIAL NOT NULL, quest_id INT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, picture VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, position INT NOT NULL, crown_reward INT DEFAULT NULL, xp_reward INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4DB352CE209E9EF4 ON quest_step (quest_id)');
        $this->addSql('CREATE TABLE quest_step_item (quest_step_id INT NOT NULL, item_id INT NOT NULL, PRIMARY KEY(quest_step_id, item_id))');
        $this->addSql('CREATE INDEX IDX_F7D0B5972795A3D7 ON quest_step_item (quest_step_id)');
        $this->addSql('CREATE INDEX IDX_F7D0B597126F525E ON quest_step_item (item_id)');
        $this->addSql('ALTER TABLE quest_step ADD CONSTRAINT FK_4DB352CE209E9EF4 FOREIGN KEY (quest_id) REFERENCES quest (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE quest_step_item ADD CONSTRAINT FK_F7D0B5972795A3D7 FOREIGN KEY (quest_step_id) REFERENCES quest_step (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE quest_step_item ADD CONSTRAINT FK_F7D0B597126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE quest_step DROP CONSTRAINT FK_4DB352CE209E9EF4');
        $this->addSql('ALTER TABLE quest_step_item DROP CONSTRAINT FK_F7D0B5972795A3D7');
        $this->addSql('ALTER TABLE quest_step_item DROP CONSTRAINT FK_F7D0B597126F525E');
        $this->addSql('DROP TABLE quest_step');
        $this->addSql('DROP TABLE quest_step_item');
    }
}
