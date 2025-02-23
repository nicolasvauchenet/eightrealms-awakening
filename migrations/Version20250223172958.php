<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250223172958 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER INDEX idx_70c85f5964d218e RENAME TO IDX_FC9D613164D218E');
        $this->addSql('ALTER TABLE screen_combat_npc DROP CONSTRAINT fk_89246a09adb0db66');
        $this->addSql('ALTER TABLE screen_combat_npc DROP CONSTRAINT fk_89246a09ca7d6b89');
        $this->addSql('ALTER TABLE screen_combat_npc ADD CONSTRAINT FK_7A811B65B1B0FF74 FOREIGN KEY (screen_combat_id) REFERENCES "screen_combat" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE screen_combat_npc ADD CONSTRAINT FK_7A811B65CA7D6B89 FOREIGN KEY (npc_id) REFERENCES npc (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER INDEX idx_89246a09adb0db66 RENAME TO IDX_7A811B65B1B0FF74');
        $this->addSql('ALTER INDEX idx_89246a09ca7d6b89 RENAME TO IDX_7A811B65CA7D6B89');
        $this->addSql('ALTER TABLE screen_combat_creature DROP CONSTRAINT fk_a28be5feadb0db66');
        $this->addSql('ALTER TABLE screen_combat_creature DROP CONSTRAINT fk_a28be5fef9ab048');
        $this->addSql('ALTER TABLE screen_combat_creature ADD CONSTRAINT FK_CDE895BEB1B0FF74 FOREIGN KEY (screen_combat_id) REFERENCES "screen_combat" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE screen_combat_creature ADD CONSTRAINT FK_CDE895BEF9AB048 FOREIGN KEY (creature_id) REFERENCES creature (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER INDEX idx_a28be5feadb0db66 RENAME TO IDX_CDE895BEB1B0FF74');
        $this->addSql('ALTER INDEX idx_a28be5fef9ab048 RENAME TO IDX_CDE895BEF9AB048');
        $this->addSql('ALTER INDEX uniq_943ee93264d218e RENAME TO UNIQ_22ED1DAB64D218E');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER INDEX uniq_22ed1dab64d218e RENAME TO uniq_943ee93264d218e');
        $this->addSql('ALTER TABLE screen_combat_creature DROP CONSTRAINT FK_CDE895BEB1B0FF74');
        $this->addSql('ALTER TABLE screen_combat_creature DROP CONSTRAINT FK_CDE895BEF9AB048');
        $this->addSql('ALTER TABLE screen_combat_creature ADD CONSTRAINT fk_a28be5feadb0db66 FOREIGN KEY (screen_combat_id) REFERENCES screen_combat (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE screen_combat_creature ADD CONSTRAINT fk_a28be5fef9ab048 FOREIGN KEY (creature_id) REFERENCES creature (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER INDEX idx_cde895bef9ab048 RENAME TO idx_a28be5fef9ab048');
        $this->addSql('ALTER INDEX idx_cde895beb1b0ff74 RENAME TO idx_a28be5feadb0db66');
        $this->addSql('ALTER TABLE screen_combat_npc DROP CONSTRAINT FK_7A811B65B1B0FF74');
        $this->addSql('ALTER TABLE screen_combat_npc DROP CONSTRAINT FK_7A811B65CA7D6B89');
        $this->addSql('ALTER TABLE screen_combat_npc ADD CONSTRAINT fk_89246a09adb0db66 FOREIGN KEY (screen_combat_id) REFERENCES screen_combat (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE screen_combat_npc ADD CONSTRAINT fk_89246a09ca7d6b89 FOREIGN KEY (npc_id) REFERENCES npc (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER INDEX idx_7a811b65ca7d6b89 RENAME TO idx_89246a09ca7d6b89');
        $this->addSql('ALTER INDEX idx_7a811b65b1b0ff74 RENAME TO idx_89246a09adb0db66');
        $this->addSql('ALTER INDEX idx_fc9d613164d218e RENAME TO idx_70c85f5964d218e');
    }
}
