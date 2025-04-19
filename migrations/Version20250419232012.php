<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250419232012 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE spell (id SERIAL NOT NULL, category_id INT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, description TEXT NOT NULL, type VARCHAR(255) NOT NULL, mana_cost INT NOT NULL, target VARCHAR(255) DEFAULT NULL, effect VARCHAR(255) DEFAULT NULL, amount INT DEFAULT NULL, area INT DEFAULT NULL, duration INT DEFAULT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_D03FCD8D12469DE2 ON spell (category_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE spell ADD CONSTRAINT FK_D03FCD8D12469DE2 FOREIGN KEY (category_id) REFERENCES "category_spell" (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE spell DROP CONSTRAINT FK_D03FCD8D12469DE2
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE spell
        SQL);
    }
}
