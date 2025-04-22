<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250422145854 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE interaction_screen (id INT NOT NULL, character_id INT NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_29F5D5AF1136BE75 ON interaction_screen (character_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE interaction_screen ADD CONSTRAINT FK_29F5D5AF1136BE75 FOREIGN KEY (character_id) REFERENCES character (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE interaction_screen ADD CONSTRAINT FK_29F5D5AFBF396750 FOREIGN KEY (id) REFERENCES screen (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE interaction_screen DROP CONSTRAINT FK_29F5D5AF1136BE75
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE interaction_screen DROP CONSTRAINT FK_29F5D5AFBF396750
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE interaction_screen
        SQL);
    }
}
