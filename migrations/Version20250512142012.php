<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250512142012 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE reward_location (id SERIAL NOT NULL, reward_id INT NOT NULL, location_id INT NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_ED124418E466ACA1 ON reward_location (reward_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_ED12441864D218E ON reward_location (location_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reward_location ADD CONSTRAINT FK_ED124418E466ACA1 FOREIGN KEY (reward_id) REFERENCES reward (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reward_location ADD CONSTRAINT FK_ED12441864D218E FOREIGN KEY (location_id) REFERENCES location (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reward_location DROP CONSTRAINT FK_ED124418E466ACA1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reward_location DROP CONSTRAINT FK_ED12441864D218E
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE reward_location
        SQL);
    }
}
