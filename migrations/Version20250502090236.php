<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250502090236 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE repair_screen (id INT NOT NULL, character_id INT NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_8C51371136BE75 ON repair_screen (character_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE repair_screen ADD CONSTRAINT FK_8C51371136BE75 FOREIGN KEY (character_id) REFERENCES character (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE repair_screen ADD CONSTRAINT FK_8C5137BF396750 FOREIGN KEY (id) REFERENCES screen (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE repair_screen DROP CONSTRAINT FK_8C51371136BE75
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE repair_screen DROP CONSTRAINT FK_8C5137BF396750
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE repair_screen
        SQL);
    }
}
