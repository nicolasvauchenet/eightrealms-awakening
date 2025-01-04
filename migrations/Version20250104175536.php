<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250104175536 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER INDEX idx_2cbb2b141136be75 RENAME TO IDX_2CBB2B1499E6F5DF');
        $this->addSql('ALTER TABLE scene ADD quest_step_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scene ADD CONSTRAINT FK_D979EFDA2795A3D7 FOREIGN KEY (quest_step_id) REFERENCES quest_step (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D979EFDA2795A3D7 ON scene (quest_step_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE scene DROP CONSTRAINT FK_D979EFDA2795A3D7');
        $this->addSql('DROP INDEX UNIQ_D979EFDA2795A3D7');
        $this->addSql('ALTER TABLE scene DROP quest_step_id');
        $this->addSql('ALTER INDEX idx_2cbb2b1499e6f5df RENAME TO idx_2cbb2b141136be75');
    }
}
