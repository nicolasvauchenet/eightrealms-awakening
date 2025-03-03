<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250303091041 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE npc_combat (id SERIAL NOT NULL, combat_id INT NOT NULL, npc_id INT NOT NULL, health INT NOT NULL, mana INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6B6DE35DFC7EEDB8 ON npc_combat (combat_id)');
        $this->addSql('CREATE INDEX IDX_6B6DE35DCA7D6B89 ON npc_combat (npc_id)');
        $this->addSql('ALTER TABLE npc_combat ADD CONSTRAINT FK_6B6DE35DFC7EEDB8 FOREIGN KEY (combat_id) REFERENCES combat (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE npc_combat ADD CONSTRAINT FK_6B6DE35DCA7D6B89 FOREIGN KEY (npc_id) REFERENCES npc (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE npc_combat DROP CONSTRAINT FK_6B6DE35DFC7EEDB8');
        $this->addSql('ALTER TABLE npc_combat DROP CONSTRAINT FK_6B6DE35DCA7D6B89');
        $this->addSql('DROP TABLE npc_combat');
    }
}
