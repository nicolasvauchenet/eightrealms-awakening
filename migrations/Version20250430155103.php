<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250430155103 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE quest ADD giver_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE quest ADD CONSTRAINT FK_4317F81775BD1D29 FOREIGN KEY (giver_id) REFERENCES character (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_4317F81775BD1D29 ON quest (giver_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE quest_step ADD giver_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE quest_step ADD CONSTRAINT FK_4DB352CE75BD1D29 FOREIGN KEY (giver_id) REFERENCES character (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_4DB352CE75BD1D29 ON quest_step (giver_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE quest DROP CONSTRAINT FK_4317F81775BD1D29
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_4317F81775BD1D29
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE quest DROP giver_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE quest_step DROP CONSTRAINT FK_4DB352CE75BD1D29
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_4DB352CE75BD1D29
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE quest_step DROP giver_id
        SQL);
    }
}
