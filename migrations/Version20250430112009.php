<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250430112009 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE quest ADD reward_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE quest ADD CONSTRAINT FK_4317F817E466ACA1 FOREIGN KEY (reward_id) REFERENCES reward (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_4317F817E466ACA1 ON quest (reward_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE quest_step ADD reward_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE quest_step ADD CONSTRAINT FK_4DB352CEE466ACA1 FOREIGN KEY (reward_id) REFERENCES reward (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_4DB352CEE466ACA1 ON quest_step (reward_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE quest_step DROP CONSTRAINT FK_4DB352CEE466ACA1
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_4DB352CEE466ACA1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE quest_step DROP reward_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE quest DROP CONSTRAINT FK_4317F817E466ACA1
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_4317F817E466ACA1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE quest DROP reward_id
        SQL);
    }
}
