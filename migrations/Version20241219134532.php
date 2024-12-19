<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241219134532 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE weapon (id INT NOT NULL, damage INT NOT NULL, range INT DEFAULT NULL, target VARCHAR(255) DEFAULT NULL, amount INT DEFAULT NULL, duration INT DEFAULT NULL, area INT DEFAULT NULL, charge INT DEFAULT NULL, recharge_cost INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE weapon ADD CONSTRAINT FK_6933A7E6BF396750 FOREIGN KEY (id) REFERENCES item (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE weapon DROP CONSTRAINT FK_6933A7E6BF396750');
        $this->addSql('DROP TABLE weapon');
    }
}
