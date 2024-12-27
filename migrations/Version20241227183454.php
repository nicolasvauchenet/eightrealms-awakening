<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241227183454 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE combat_scene_creature (id SERIAL NOT NULL, scene_id INT NOT NULL, creature_id INT NOT NULL, crown_reward INT DEFAULT NULL, xp_reward INT DEFAULT NULL, alive BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D31A30F7166053B4 ON combat_scene_creature (scene_id)');
        $this->addSql('CREATE INDEX IDX_D31A30F7F9AB048 ON combat_scene_creature (creature_id)');
        $this->addSql('ALTER TABLE combat_scene_creature ADD CONSTRAINT FK_D31A30F7166053B4 FOREIGN KEY (scene_id) REFERENCES scene (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE combat_scene_creature ADD CONSTRAINT FK_D31A30F7F9AB048 FOREIGN KEY (creature_id) REFERENCES creature (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE player_creature DROP CONSTRAINT FK_2CBB2B14166053B4');
        $this->addSql('ALTER TABLE player_creature ADD CONSTRAINT FK_2CBB2B14166053B4 FOREIGN KEY (scene_id) REFERENCES scene (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE combat_scene_creature DROP CONSTRAINT FK_D31A30F7166053B4');
        $this->addSql('ALTER TABLE combat_scene_creature DROP CONSTRAINT FK_D31A30F7F9AB048');
        $this->addSql('DROP TABLE combat_scene_creature');
        $this->addSql('ALTER TABLE player_creature DROP CONSTRAINT fk_2cbb2b14166053b4');
        $this->addSql('ALTER TABLE player_creature ADD CONSTRAINT fk_2cbb2b14166053b4 FOREIGN KEY (scene_id) REFERENCES combat_scene (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
