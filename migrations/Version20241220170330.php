<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241220170330 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE action (id SERIAL NOT NULL, label VARCHAR(255) NOT NULL, picture VARCHAR(255) DEFAULT NULL, action_requirements JSON DEFAULT NULL, action_effects JSON DEFAULT NULL, scene_id INT NOT NULL, target_scene_id INT DEFAULT NULL, target_screen_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_47CC8C92166053B4 ON action (scene_id)');
        $this->addSql('CREATE INDEX IDX_47CC8C92CCCB83DD ON action (target_scene_id)');
        $this->addSql('CREATE INDEX IDX_47CC8C927512050E ON action (target_screen_id)');
        $this->addSql('ALTER TABLE action ADD CONSTRAINT FK_47CC8C92166053B4 FOREIGN KEY (scene_id) REFERENCES scene (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE action ADD CONSTRAINT FK_47CC8C92CCCB83DD FOREIGN KEY (target_scene_id) REFERENCES scene (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE action ADD CONSTRAINT FK_47CC8C927512050E FOREIGN KEY (target_screen_id) REFERENCES screen (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE action DROP CONSTRAINT FK_47CC8C92166053B4');
        $this->addSql('ALTER TABLE action DROP CONSTRAINT FK_47CC8C92CCCB83DD');
        $this->addSql('ALTER TABLE action DROP CONSTRAINT FK_47CC8C927512050E');
        $this->addSql('DROP TABLE action');
    }
}
