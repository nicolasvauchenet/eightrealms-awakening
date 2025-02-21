<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250221124224 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE npc ADD location_id INT NOT NULL');
        $this->addSql('ALTER TABLE npc ADD CONSTRAINT FK_468C762C64D218E FOREIGN KEY (location_id) REFERENCES location (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_468C762C64D218E ON npc (location_id)');
        $this->addSql('ALTER TABLE player ADD location_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A6564D218E FOREIGN KEY (location_id) REFERENCES location (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_98197A6564D218E ON player (location_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE npc DROP CONSTRAINT FK_468C762C64D218E');
        $this->addSql('DROP INDEX IDX_468C762C64D218E');
        $this->addSql('ALTER TABLE npc DROP location_id');
        $this->addSql('ALTER TABLE player DROP CONSTRAINT FK_98197A6564D218E');
        $this->addSql('DROP INDEX IDX_98197A6564D218E');
        $this->addSql('ALTER TABLE player DROP location_id');
    }
}
