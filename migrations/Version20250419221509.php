<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250419221509 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE magical_weapon (id INT NOT NULL, target VARCHAR(255) NOT NULL, effect VARCHAR(255) DEFAULT NULL, amount INT NOT NULL, duration INT DEFAULT NULL, area INT DEFAULT NULL, charge_max INT NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE magical_weapon ADD CONSTRAINT FK_B54AA82FBF396750 FOREIGN KEY (id) REFERENCES item (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE magical_weapon DROP CONSTRAINT FK_B54AA82FBF396750
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE magical_weapon
        SQL);
    }
}
