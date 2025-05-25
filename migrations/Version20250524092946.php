<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250524092946 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE character_alignment (id SERIAL NOT NULL, character_id INT NOT NULL, alignment_id INT NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_AB9EBC671136BE75 ON character_alignment (character_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_AB9EBC67AB7AC2A0 ON character_alignment (alignment_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE character_alignment ADD CONSTRAINT FK_AB9EBC671136BE75 FOREIGN KEY (character_id) REFERENCES character (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE character_alignment ADD CONSTRAINT FK_AB9EBC67AB7AC2A0 FOREIGN KEY (alignment_id) REFERENCES alignment (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE character_alignment DROP CONSTRAINT FK_AB9EBC671136BE75
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE character_alignment DROP CONSTRAINT FK_AB9EBC67AB7AC2A0
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE character_alignment
        SQL);
    }
}
