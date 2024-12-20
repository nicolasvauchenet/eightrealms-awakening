<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241220162101 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE place_screen (id INT NOT NULL, place_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_7D826659DA6A219 ON place_screen (place_id)');
        $this->addSql('CREATE TABLE place_screen_npc (place_screen_id INT NOT NULL, npc_id INT NOT NULL, PRIMARY KEY(place_screen_id, npc_id))');
        $this->addSql('CREATE INDEX IDX_D6B96F24353DFE5F ON place_screen_npc (place_screen_id)');
        $this->addSql('CREATE INDEX IDX_D6B96F24CA7D6B89 ON place_screen_npc (npc_id)');
        $this->addSql('ALTER TABLE place_screen ADD CONSTRAINT FK_7D826659DA6A219 FOREIGN KEY (place_id) REFERENCES place (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE place_screen ADD CONSTRAINT FK_7D826659BF396750 FOREIGN KEY (id) REFERENCES screen (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE place_screen_npc ADD CONSTRAINT FK_D6B96F24353DFE5F FOREIGN KEY (place_screen_id) REFERENCES place_screen (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE place_screen_npc ADD CONSTRAINT FK_D6B96F24CA7D6B89 FOREIGN KEY (npc_id) REFERENCES npc (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE place_screen DROP CONSTRAINT FK_7D826659DA6A219');
        $this->addSql('ALTER TABLE place_screen DROP CONSTRAINT FK_7D826659BF396750');
        $this->addSql('ALTER TABLE place_screen_npc DROP CONSTRAINT FK_D6B96F24353DFE5F');
        $this->addSql('ALTER TABLE place_screen_npc DROP CONSTRAINT FK_D6B96F24CA7D6B89');
        $this->addSql('DROP TABLE place_screen');
        $this->addSql('DROP TABLE place_screen_npc');
    }
}
