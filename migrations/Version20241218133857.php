<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241218133857 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE player (id INT NOT NULL, owner_id INT NOT NULL, level INT NOT NULL, experience INT NOT NULL, alive BOOLEAN NOT NULL, last_active_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_98197A657E3C61F9 ON player (owner_id)');
        $this->addSql('COMMENT ON COLUMN player.last_active_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A657E3C61F9 FOREIGN KEY (owner_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A65BF396750 FOREIGN KEY (id) REFERENCES character (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE player DROP CONSTRAINT FK_98197A657E3C61F9');
        $this->addSql('ALTER TABLE player DROP CONSTRAINT FK_98197A65BF396750');
        $this->addSql('DROP TABLE player');
    }
}