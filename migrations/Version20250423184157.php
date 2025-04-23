<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250423184157 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE combat_enemy (id SERIAL NOT NULL, enemy_id INT NOT NULL, combat_id INT NOT NULL, health INT NOT NULL, mana INT NOT NULL, position INT NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_9759850900C982F ON combat_enemy (enemy_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_9759850FC7EEDB8 ON combat_enemy (combat_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE combat_enemy ADD CONSTRAINT FK_9759850900C982F FOREIGN KEY (enemy_id) REFERENCES character (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE combat_enemy ADD CONSTRAINT FK_9759850FC7EEDB8 FOREIGN KEY (combat_id) REFERENCES combat (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE combat_enemy DROP CONSTRAINT FK_9759850900C982F
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE combat_enemy DROP CONSTRAINT FK_9759850FC7EEDB8
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE combat_enemy
        SQL);
    }
}
