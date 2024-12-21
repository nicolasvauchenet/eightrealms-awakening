<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241221095558 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE place_scene ADD place_id INT NOT NULL');
        $this->addSql('ALTER TABLE place_scene ADD CONSTRAINT FK_700FF4F9DA6A219 FOREIGN KEY (place_id) REFERENCES place (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_700FF4F9DA6A219 ON place_scene (place_id)');
        $this->addSql('ALTER TABLE player DROP CONSTRAINT fk_98197a6564d218e');
        $this->addSql('DROP INDEX idx_98197a6564d218e');
        $this->addSql('ALTER TABLE player RENAME COLUMN place_id TO current_place_id');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A6590DED833 FOREIGN KEY (current_place_id) REFERENCES place (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_98197A6590DED833 ON player (current_place_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE player DROP CONSTRAINT FK_98197A6590DED833');
        $this->addSql('DROP INDEX IDX_98197A6590DED833');
        $this->addSql('ALTER TABLE player RENAME COLUMN current_place_id TO place_id');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT fk_98197a6564d218e FOREIGN KEY (place_id) REFERENCES place (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_98197a6564d218e ON player (place_id)');
        $this->addSql('ALTER TABLE place_scene DROP CONSTRAINT FK_700FF4F9DA6A219');
        $this->addSql('DROP INDEX IDX_700FF4F9DA6A219');
        $this->addSql('ALTER TABLE place_scene DROP place_id');
    }
}
