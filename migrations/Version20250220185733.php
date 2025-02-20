<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250220185733 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE player_location (id SERIAL NOT NULL, player_id INT NOT NULL, location_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5849C82B99E6F5DF ON player_location (player_id)');
        $this->addSql('CREATE INDEX IDX_5849C82B64D218E ON player_location (location_id)');
        $this->addSql('ALTER TABLE player_location ADD CONSTRAINT FK_5849C82B99E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE player_location ADD CONSTRAINT FK_5849C82B64D218E FOREIGN KEY (location_id) REFERENCES location (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE player_location DROP CONSTRAINT FK_5849C82B99E6F5DF');
        $this->addSql('ALTER TABLE player_location DROP CONSTRAINT FK_5849C82B64D218E');
        $this->addSql('DROP TABLE player_location');
    }
}
