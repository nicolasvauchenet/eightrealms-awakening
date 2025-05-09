<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250419232851 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE character_spell (id SERIAL NOT NULL, character_id INT NOT NULL, spell_id INT NOT NULL, level INT NOT NULL, mana_cost INT DEFAULT NULL, amount_bonus INT DEFAULT NULL, area_bonus INT DEFAULT NULL, duration_bonus INT DEFAULT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_2EFC2AEF1136BE75 ON character_spell (character_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_2EFC2AEF479EC90D ON character_spell (spell_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE character_spell ADD CONSTRAINT FK_2EFC2AEF1136BE75 FOREIGN KEY (character_id) REFERENCES character (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE character_spell ADD CONSTRAINT FK_2EFC2AEF479EC90D FOREIGN KEY (spell_id) REFERENCES spell (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE character_spell DROP CONSTRAINT FK_2EFC2AEF1136BE75
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE character_spell DROP CONSTRAINT FK_2EFC2AEF479EC90D
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE character_spell
        SQL);
    }
}
