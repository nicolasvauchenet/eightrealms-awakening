<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250419231219 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE player_npc_item (id SERIAL NOT NULL, player_npc_id INT NOT NULL, item_id INT NOT NULL, original BOOLEAN NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_408023C7557DFD57 ON player_npc_item (player_npc_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_408023C7126F525E ON player_npc_item (item_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_npc_item ADD CONSTRAINT FK_408023C7557DFD57 FOREIGN KEY (player_npc_id) REFERENCES player_npc (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_npc_item ADD CONSTRAINT FK_408023C7126F525E FOREIGN KEY (item_id) REFERENCES item (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_npc_item DROP CONSTRAINT FK_408023C7557DFD57
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE player_npc_item DROP CONSTRAINT FK_408023C7126F525E
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE player_npc_item
        SQL);
    }
}
