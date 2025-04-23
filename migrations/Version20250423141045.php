<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250423141045 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE dialog_screen (id INT NOT NULL, dialog_step_id INT NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_CCA3B3CF5E46C4E2 ON dialog_screen (dialog_step_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE dialog_screen ADD CONSTRAINT FK_CCA3B3CF5E46C4E2 FOREIGN KEY (dialog_step_id) REFERENCES dialog_step (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE dialog_screen ADD CONSTRAINT FK_CCA3B3CFBF396750 FOREIGN KEY (id) REFERENCES screen (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE dialog_screen DROP CONSTRAINT FK_CCA3B3CF5E46C4E2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE dialog_screen DROP CONSTRAINT FK_CCA3B3CFBF396750
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE dialog_screen
        SQL);
    }
}
