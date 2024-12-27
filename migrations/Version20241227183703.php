<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241227183703 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE combat_scene_npc (id SERIAL NOT NULL, scene_id INT NOT NULL, npc_id INT NOT NULL, crown_reward INT DEFAULT NULL, xp_reward INT DEFAULT NULL, alive BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D54A53D166053B4 ON combat_scene_npc (scene_id)');
        $this->addSql('CREATE INDEX IDX_D54A53DCA7D6B89 ON combat_scene_npc (npc_id)');
        $this->addSql('ALTER TABLE combat_scene_npc ADD CONSTRAINT FK_D54A53D166053B4 FOREIGN KEY (scene_id) REFERENCES scene (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE combat_scene_npc ADD CONSTRAINT FK_D54A53DCA7D6B89 FOREIGN KEY (npc_id) REFERENCES npc (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE combat_scene_npc DROP CONSTRAINT FK_D54A53D166053B4');
        $this->addSql('ALTER TABLE combat_scene_npc DROP CONSTRAINT FK_D54A53DCA7D6B89');
        $this->addSql('DROP TABLE combat_scene_npc');
    }
}
