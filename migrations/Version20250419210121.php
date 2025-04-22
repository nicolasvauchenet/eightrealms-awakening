<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250419210121 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE character (id SERIAL NOT NULL, race_id INT NOT NULL, profession_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, picture VARCHAR(255) NOT NULL, thumbnail VARCHAR(255) DEFAULT NULL, description TEXT NOT NULL, strength INT NOT NULL, dexterity INT NOT NULL, constitution INT NOT NULL, wisdom INT NOT NULL, intelligence INT NOT NULL, charisma INT NOT NULL, health_max INT NOT NULL, mana_max INT NOT NULL, fortune INT NOT NULL, derivative VARCHAR(255) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_937AB0346E59D40D ON character (race_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_937AB034FDEF8996 ON character (profession_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE character ADD CONSTRAINT FK_937AB0346E59D40D FOREIGN KEY (race_id) REFERENCES race (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE character ADD CONSTRAINT FK_937AB034FDEF8996 FOREIGN KEY (profession_id) REFERENCES profession (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE character DROP CONSTRAINT FK_937AB0346E59D40D
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE character DROP CONSTRAINT FK_937AB034FDEF8996
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE character
        SQL);
    }
}
