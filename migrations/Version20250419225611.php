<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250419225611 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE character_item (id SERIAL NOT NULL, character_id INT NOT NULL, item_id INT NOT NULL, health INT DEFAULT NULL, charge INT DEFAULT NULL, usage INT DEFAULT NULL, equipped BOOLEAN NOT NULL, slot VARCHAR(255) DEFAULT NULL, quest_item BOOLEAN NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_8E731861136BE75 ON character_item (character_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_8E73186126F525E ON character_item (item_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE character_item ADD CONSTRAINT FK_8E731861136BE75 FOREIGN KEY (character_id) REFERENCES character (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE character_item ADD CONSTRAINT FK_8E73186126F525E FOREIGN KEY (item_id) REFERENCES item (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE character_item DROP CONSTRAINT FK_8E731861136BE75
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE character_item DROP CONSTRAINT FK_8E73186126F525E
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE character_item
        SQL);
    }
}
