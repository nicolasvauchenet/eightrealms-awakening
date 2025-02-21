<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250221180400 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE player_quest (id SERIAL NOT NULL, player_id INT NOT NULL, step_id INT NOT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FC65835199E6F5DF ON player_quest (player_id)');
        $this->addSql('CREATE INDEX IDX_FC65835173B21E9C ON player_quest (step_id)');
        $this->addSql('ALTER TABLE player_quest ADD CONSTRAINT FK_FC65835199E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE player_quest ADD CONSTRAINT FK_FC65835173B21E9C FOREIGN KEY (step_id) REFERENCES step (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE player_quest DROP CONSTRAINT FK_FC65835199E6F5DF');
        $this->addSql('ALTER TABLE player_quest DROP CONSTRAINT FK_FC65835173B21E9C');
        $this->addSql('DROP TABLE player_quest');
    }
}
