<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250423134407 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE dialog_step (id SERIAL NOT NULL, dialog_id INT NOT NULL, text TEXT NOT NULL, first BOOLEAN NOT NULL, conditions JSON DEFAULT NULL, effects JSON DEFAULT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_DA95212B5E46C4E2 ON dialog_step (dialog_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE dialog_step ADD CONSTRAINT FK_DA95212B5E46C4E2 FOREIGN KEY (dialog_id) REFERENCES dialog (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE dialog_step DROP CONSTRAINT FK_DA95212B5E46C4E2
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE dialog_step
        SQL);
    }
}
