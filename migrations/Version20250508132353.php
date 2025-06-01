<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250508132353 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE book (id INT NOT NULL, thumbnail VARCHAR(255) NOT NULL, book_author VARCHAR(255) DEFAULT NULL, book_category VARCHAR(255) DEFAULT NULL, book_content TEXT DEFAULT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE book ADD CONSTRAINT FK_CBE5A331BF396750 FOREIGN KEY (id) REFERENCES item (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER INDEX idx_3bad370f99e6f5df RENAME TO IDX_3376850D99E6F5DF
        SQL);
        $this->addSql(<<<'SQL'
            ALTER INDEX idx_3bad370fca7d6b89 RENAME TO IDX_3376850D1136BE75
        SQL);
        $this->addSql(<<<'SQL'
            ALTER INDEX idx_408023c7557dfd57 RENAME TO IDX_C43EA66F910BEE57
        SQL);
        $this->addSql(<<<'SQL'
            ALTER INDEX idx_408023c7126f525e RENAME TO IDX_C43EA66F126F525E
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE book DROP CONSTRAINT FK_CBE5A331BF396750
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE book
        SQL);
        $this->addSql(<<<'SQL'
            ALTER INDEX idx_3376850d1136be75 RENAME TO idx_3bad370fca7d6b89
        SQL);
        $this->addSql(<<<'SQL'
            ALTER INDEX idx_3376850d99e6f5df RENAME TO idx_3bad370f99e6f5df
        SQL);
        $this->addSql(<<<'SQL'
            ALTER INDEX idx_c43ea66f126f525e RENAME TO idx_408023c7126f525e
        SQL);
        $this->addSql(<<<'SQL'
            ALTER INDEX idx_c43ea66f910bee57 RENAME TO idx_408023c7557dfd57
        SQL);
    }
}
