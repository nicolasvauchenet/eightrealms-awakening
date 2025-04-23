<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250423134704 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE dialog_reply (id SERIAL NOT NULL, dialog_step_id INT NOT NULL, next_step_id INT NOT NULL, text TEXT NOT NULL, conditions JSON DEFAULT NULL, effects JSON DEFAULT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_7EE26FF85EA31EC3 ON dialog_reply (dialog_step_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_7EE26FF8B13C343E ON dialog_reply (next_step_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE dialog_reply ADD CONSTRAINT FK_7EE26FF85EA31EC3 FOREIGN KEY (dialog_step_id) REFERENCES dialog_step (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE dialog_reply ADD CONSTRAINT FK_7EE26FF8B13C343E FOREIGN KEY (next_step_id) REFERENCES dialog_step (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE dialog_reply DROP CONSTRAINT FK_7EE26FF85EA31EC3
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE dialog_reply DROP CONSTRAINT FK_7EE26FF8B13C343E
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE dialog_reply
        SQL);
    }
}
