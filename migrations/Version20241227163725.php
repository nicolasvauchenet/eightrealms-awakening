<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241227163725 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE player_creature (id SERIAL NOT NULL, player_id INT NOT NULL, creature_id INT NOT NULL, scene_id INT NOT NULL, health INT NOT NULL, mana INT NOT NULL, crown_reward INT DEFAULT NULL, xp_reward INT DEFAULT NULL, alive BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2CBB2B141136BE75 ON player_creature (player_id)');
        $this->addSql('CREATE INDEX IDX_2CBB2B14F9AB048 ON player_creature (creature_id)');
        $this->addSql('ALTER TABLE player_creature ADD CONSTRAINT FK_2CBB2B141136BE75 FOREIGN KEY (player_id) REFERENCES player (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE player_creature ADD CONSTRAINT FK_2CBB2B14F9AB048 FOREIGN KEY (creature_id) REFERENCES creature (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE player_creature ADD CONSTRAINT FK_2CBB2B14166053B4 FOREIGN KEY (scene_id) REFERENCES combat_scene (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_2CBB2B14166053B4 ON player_creature (scene_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE player_creature DROP CONSTRAINT FK_2CBB2B141136BE75');
        $this->addSql('ALTER TABLE player_creature DROP CONSTRAINT FK_2CBB2B14F9AB048');
        $this->addSql('ALTER TABLE player_creature DROP CONSTRAINT FK_2CBB2B14166053B4');
        $this->addSql('DROP TABLE player_creature');
    }
}
