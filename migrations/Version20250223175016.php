<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250223175016 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE screen_interaction ADD npc_id INT NOT NULL');
        $this->addSql('ALTER TABLE screen_interaction ADD CONSTRAINT FK_A37B5963CA7D6B89 FOREIGN KEY (npc_id) REFERENCES npc (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A37B5963CA7D6B89 ON screen_interaction (npc_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "screen_interaction" DROP CONSTRAINT FK_A37B5963CA7D6B89');
        $this->addSql('DROP INDEX UNIQ_A37B5963CA7D6B89');
        $this->addSql('ALTER TABLE "screen_interaction" DROP npc_id');
    }
}
