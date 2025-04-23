<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250422201754 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE reward (id SERIAL NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE reward_item (reward_id INT NOT NULL, item_id INT NOT NULL, PRIMARY KEY(reward_id, item_id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_1E0AB585E466ACA1 ON reward_item (reward_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_1E0AB585126F525E ON reward_item (item_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reward_item ADD CONSTRAINT FK_1E0AB585E466ACA1 FOREIGN KEY (reward_id) REFERENCES reward (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reward_item ADD CONSTRAINT FK_1E0AB585126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reward_item DROP CONSTRAINT FK_1E0AB585E466ACA1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reward_item DROP CONSTRAINT FK_1E0AB585126F525E
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE reward
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE reward_item
        SQL);
    }
}
