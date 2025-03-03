<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250303092207 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE screen_combat_creature DROP CONSTRAINT fk_cde895beb1b0ff74');
        $this->addSql('ALTER TABLE screen_combat_creature DROP CONSTRAINT fk_cde895bef9ab048');
        $this->addSql('ALTER TABLE screen_combat_npc DROP CONSTRAINT fk_7a811b65b1b0ff74');
        $this->addSql('ALTER TABLE screen_combat_npc DROP CONSTRAINT fk_7a811b65ca7d6b89');
        $this->addSql('DROP TABLE screen_combat_creature');
        $this->addSql('DROP TABLE screen_combat_npc');
        $this->addSql('ALTER TABLE combat ADD combat_screen_id INT NOT NULL');
        $this->addSql('ALTER TABLE combat ADD CONSTRAINT FK_8D51E398ADB0DB66 FOREIGN KEY (combat_screen_id) REFERENCES "screen_combat" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_8D51E398ADB0DB66 ON combat (combat_screen_id)');
        $this->addSql('ALTER TABLE screen_combat DROP CONSTRAINT fk_70c85f5964d218e');
        $this->addSql('DROP INDEX idx_fc9d613164d218e');
        $this->addSql('ALTER TABLE screen_combat DROP location_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE TABLE screen_combat_creature (screen_combat_id INT NOT NULL, creature_id INT NOT NULL, PRIMARY KEY(screen_combat_id, creature_id))');
        $this->addSql('CREATE INDEX idx_cde895bef9ab048 ON screen_combat_creature (creature_id)');
        $this->addSql('CREATE INDEX idx_cde895beb1b0ff74 ON screen_combat_creature (screen_combat_id)');
        $this->addSql('CREATE TABLE screen_combat_npc (screen_combat_id INT NOT NULL, npc_id INT NOT NULL, PRIMARY KEY(screen_combat_id, npc_id))');
        $this->addSql('CREATE INDEX idx_7a811b65ca7d6b89 ON screen_combat_npc (npc_id)');
        $this->addSql('CREATE INDEX idx_7a811b65b1b0ff74 ON screen_combat_npc (screen_combat_id)');
        $this->addSql('ALTER TABLE screen_combat_creature ADD CONSTRAINT fk_cde895beb1b0ff74 FOREIGN KEY (screen_combat_id) REFERENCES screen_combat (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE screen_combat_creature ADD CONSTRAINT fk_cde895bef9ab048 FOREIGN KEY (creature_id) REFERENCES creature (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE screen_combat_npc ADD CONSTRAINT fk_7a811b65b1b0ff74 FOREIGN KEY (screen_combat_id) REFERENCES screen_combat (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE screen_combat_npc ADD CONSTRAINT fk_7a811b65ca7d6b89 FOREIGN KEY (npc_id) REFERENCES npc (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE combat DROP CONSTRAINT FK_8D51E398ADB0DB66');
        $this->addSql('DROP INDEX IDX_8D51E398ADB0DB66');
        $this->addSql('ALTER TABLE combat DROP combat_screen_id');
        $this->addSql('ALTER TABLE "screen_combat" ADD location_id INT NOT NULL');
        $this->addSql('ALTER TABLE "screen_combat" ADD CONSTRAINT fk_70c85f5964d218e FOREIGN KEY (location_id) REFERENCES location (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_fc9d613164d218e ON "screen_combat" (location_id)');
    }
}
