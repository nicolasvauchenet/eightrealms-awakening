<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241222175450 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE quest (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, picture VARCHAR(255) DEFAULT NULL, description TEXT DEFAULT NULL, type VARCHAR(255) NOT NULL, xp_reward INT NOT NULL, crown_reward INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE quest_item (quest_id INT NOT NULL, item_id INT NOT NULL, PRIMARY KEY(quest_id, item_id))');
        $this->addSql('CREATE INDEX IDX_111189EC209E9EF4 ON quest_item (quest_id)');
        $this->addSql('CREATE INDEX IDX_111189EC126F525E ON quest_item (item_id)');
        $this->addSql('ALTER TABLE quest_item ADD CONSTRAINT FK_111189EC209E9EF4 FOREIGN KEY (quest_id) REFERENCES quest (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE quest_item ADD CONSTRAINT FK_111189EC126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE quest_item DROP CONSTRAINT FK_111189EC209E9EF4');
        $this->addSql('ALTER TABLE quest_item DROP CONSTRAINT FK_111189EC126F525E');
        $this->addSql('DROP TABLE quest');
        $this->addSql('DROP TABLE quest_item');
    }
}
