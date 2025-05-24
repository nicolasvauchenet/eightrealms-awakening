<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250515132209 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE riddle (id SERIAL NOT NULL, quest_step_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, picture VARCHAR(255) DEFAULT NULL, thumbnail VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, type VARCHAR(255) NOT NULL, characteristic VARCHAR(255) DEFAULT NULL, difficulty INT DEFAULT NULL, success_effects JSON DEFAULT NULL, success_description TEXT DEFAULT NULL, failure_effects JSON DEFAULT NULL, failure_description TEXT DEFAULT NULL, repeat_on_failure BOOLEAN NOT NULL, redirect_to_dialog VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))
        SQL
        );
        $this->addSql(<<<'SQL'
            ALTER TABLE riddle ADD CONSTRAINT FK_6C00AA812795A3D7 FOREIGN KEY (quest_step_id) REFERENCES quest_step (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL
        );
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_6C00AA812795A3D7 ON riddle (quest_step_id)
        SQL
        );

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL
        );
        $this->addSql(<<<'SQL'
            ALTER TABLE riddle DROP CONSTRAINT FK_6C00AA812795A3D7
        SQL
        );
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_6C00AA812795A3D7
        SQL
        );
        $this->addSql(<<<'SQL'
            DROP TABLE riddle
        SQL
        );
    }
}
