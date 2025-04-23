<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250422203752 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE cinematic_screen ADD reward_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE cinematic_screen ADD CONSTRAINT FK_51565BDEE466ACA1 FOREIGN KEY (reward_id) REFERENCES reward (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_51565BDEE466ACA1 ON cinematic_screen (reward_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE cinematic_screen DROP CONSTRAINT FK_51565BDEE466ACA1
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_51565BDEE466ACA1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE cinematic_screen DROP reward_id
        SQL);
    }
}
