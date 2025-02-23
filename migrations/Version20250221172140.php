<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250221172140 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE screen_combat (id INT NOT NULL, location_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_70C85F5964D218E ON screen_combat (location_id)');
        $this->addSql('CREATE TABLE screen_combat_npc (screen_combat_id INT NOT NULL, npc_id INT NOT NULL, PRIMARY KEY(screen_combat_id, npc_id))');
        $this->addSql('CREATE INDEX IDX_89246A09ADB0DB66 ON screen_combat_npc (screen_combat_id)');
        $this->addSql('CREATE INDEX IDX_89246A09CA7D6B89 ON screen_combat_npc (npc_id)');
        $this->addSql('CREATE TABLE screen_combat_creature (screen_combat_id INT NOT NULL, creature_id INT NOT NULL, PRIMARY KEY(screen_combat_id, creature_id))');
        $this->addSql('CREATE INDEX IDX_A28BE5FEADB0DB66 ON screen_combat_creature (screen_combat_id)');
        $this->addSql('CREATE INDEX IDX_A28BE5FEF9AB048 ON screen_combat_creature (creature_id)');
        $this->addSql('ALTER TABLE screen_combat ADD CONSTRAINT FK_70C85F5964D218E FOREIGN KEY (location_id) REFERENCES location (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE screen_combat ADD CONSTRAINT FK_70C85F59BF396750 FOREIGN KEY (id) REFERENCES screen (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE screen_combat_npc ADD CONSTRAINT FK_89246A09ADB0DB66 FOREIGN KEY (screen_combat_id) REFERENCES screen_combat (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE screen_combat_npc ADD CONSTRAINT FK_89246A09CA7D6B89 FOREIGN KEY (npc_id) REFERENCES npc (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE screen_combat_creature ADD CONSTRAINT FK_A28BE5FEADB0DB66 FOREIGN KEY (screen_combat_id) REFERENCES screen_combat (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE screen_combat_creature ADD CONSTRAINT FK_A28BE5FEF9AB048 FOREIGN KEY (creature_id) REFERENCES creature (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE screen_combat DROP CONSTRAINT FK_70C85F5964D218E');
        $this->addSql('ALTER TABLE screen_combat DROP CONSTRAINT FK_70C85F59BF396750');
        $this->addSql('ALTER TABLE screen_combat_npc DROP CONSTRAINT FK_89246A09ADB0DB66');
        $this->addSql('ALTER TABLE screen_combat_npc DROP CONSTRAINT FK_89246A09CA7D6B89');
        $this->addSql('ALTER TABLE screen_combat_creature DROP CONSTRAINT FK_A28BE5FEADB0DB66');
        $this->addSql('ALTER TABLE screen_combat_creature DROP CONSTRAINT FK_A28BE5FEF9AB048');
        $this->addSql('DROP TABLE screen_combat');
        $this->addSql('DROP TABLE screen_combat_npc');
        $this->addSql('DROP TABLE screen_combat_creature');
    }
}
