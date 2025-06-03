<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250510115542 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE quest_step_trigger (id SERIAL NOT NULL, quest_step_id INT NOT NULL, type VARCHAR(255) NOT NULL, payload JSON NOT NULL, conditions JSON DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_8978BE982795A3D7 ON quest_step_trigger (quest_step_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE quest_step_trigger ADD CONSTRAINT FK_8978BE982795A3D7 FOREIGN KEY (quest_step_id) REFERENCES quest_step (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE quest_step_trigger DROP CONSTRAINT FK_8978BE982795A3D7
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE quest_step_trigger
        SQL);
    }
}
