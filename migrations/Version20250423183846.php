<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250423183846 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE combat (id SERIAL NOT NULL, reward_id INT DEFAULT NULL, location_id INT NOT NULL, quest_step_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, picture VARCHAR(255) NOT NULL, thumbnail VARCHAR(255) NOT NULL, description TEXT NOT NULL, conditions JSON DEFAULT NULL, victory_description TEXT NOT NULL, defeat_description TEXT NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_8D51E398E466ACA1 ON combat (reward_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_8D51E39864D218E ON combat (location_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_8D51E3982795A3D7 ON combat (quest_step_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE combat ADD CONSTRAINT FK_8D51E398E466ACA1 FOREIGN KEY (reward_id) REFERENCES reward (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE combat ADD CONSTRAINT FK_8D51E39864D218E FOREIGN KEY (location_id) REFERENCES location (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE combat ADD CONSTRAINT FK_8D51E3982795A3D7 FOREIGN KEY (quest_step_id) REFERENCES quest_step (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER INDEX uniq_cca3b3cf5e46c4e2 RENAME TO UNIQ_CCA3B3CF5EA31EC3
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE combat DROP CONSTRAINT FK_8D51E398E466ACA1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE combat DROP CONSTRAINT FK_8D51E39864D218E
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE combat DROP CONSTRAINT FK_8D51E3982795A3D7
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE combat
        SQL);
        $this->addSql(<<<'SQL'
            ALTER INDEX uniq_cca3b3cf5ea31ec3 RENAME TO uniq_cca3b3cf5e46c4e2
        SQL);
    }
}
