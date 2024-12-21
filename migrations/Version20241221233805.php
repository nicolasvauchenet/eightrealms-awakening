<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241221233805 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE player_location (player_id INT NOT NULL, location_id INT NOT NULL, PRIMARY KEY(player_id, location_id))');
        $this->addSql('CREATE INDEX IDX_5849C82B99E6F5DF ON player_location (player_id)');
        $this->addSql('CREATE INDEX IDX_5849C82B64D218E ON player_location (location_id)');
        $this->addSql('CREATE TABLE player_place (player_id INT NOT NULL, place_id INT NOT NULL, PRIMARY KEY(player_id, place_id))');
        $this->addSql('CREATE INDEX IDX_CB6F288B99E6F5DF ON player_place (player_id)');
        $this->addSql('CREATE INDEX IDX_CB6F288BDA6A219 ON player_place (place_id)');
        $this->addSql('ALTER TABLE player_location ADD CONSTRAINT FK_5849C82B99E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE player_location ADD CONSTRAINT FK_5849C82B64D218E FOREIGN KEY (location_id) REFERENCES location (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE player_place ADD CONSTRAINT FK_CB6F288B99E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE player_place ADD CONSTRAINT FK_CB6F288BDA6A219 FOREIGN KEY (place_id) REFERENCES place (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE player_location DROP CONSTRAINT FK_5849C82B99E6F5DF');
        $this->addSql('ALTER TABLE player_location DROP CONSTRAINT FK_5849C82B64D218E');
        $this->addSql('ALTER TABLE player_place DROP CONSTRAINT FK_CB6F288B99E6F5DF');
        $this->addSql('ALTER TABLE player_place DROP CONSTRAINT FK_CB6F288BDA6A219');
        $this->addSql('DROP TABLE player_location');
        $this->addSql('DROP TABLE player_place');
    }
}
