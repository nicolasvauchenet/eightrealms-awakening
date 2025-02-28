<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250227190005 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE screen_dialogue ADD npc_id INT NOT NULL');
        $this->addSql('ALTER TABLE screen_dialogue ADD CONSTRAINT FK_8DF98859A6E12CBD FOREIGN KEY (npc_id) REFERENCES npc (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_8DF98859A6E12CBD ON screen_dialogue (npc_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE "screen_dialogue" DROP CONSTRAINT FK_8DF98859CA7D6B89');
        $this->addSql('DROP INDEX IDX_8DF98859CA7D6B89');
        $this->addSql('ALTER TABLE "screen_dialogue" DROP npc_id');
    }
}
