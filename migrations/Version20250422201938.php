<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250422201938 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE player_reward (id SERIAL NOT NULL, player_id INT NOT NULL, reward_id INT NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_D1D1E48D99E6F5DF ON player_reward (player_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_D1D1E48DE466ACA1 ON player_reward (reward_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_reward ADD CONSTRAINT FK_D1D1E48D99E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_reward ADD CONSTRAINT FK_D1D1E48DE466ACA1 FOREIGN KEY (reward_id) REFERENCES reward (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_reward DROP CONSTRAINT FK_D1D1E48D99E6F5DF
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_reward DROP CONSTRAINT FK_D1D1E48DE466ACA1
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE player_reward
        SQL);
    }
}
