<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250524094105 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE riddle ADD target_character_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE riddle ADD CONSTRAINT FK_6C00AA81F1646D24 FOREIGN KEY (target_character_id) REFERENCES character (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_6C00AA81F1646D24 ON riddle (target_character_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE riddle DROP CONSTRAINT FK_6C00AA81F1646D24
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_6C00AA81F1646D24
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE riddle DROP target_character_id
        SQL);
    }
}
