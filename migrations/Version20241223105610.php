<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241223105610 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE trade_screen (id INT NOT NULL, npc_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_E665DF22CA7D6B89 ON trade_screen (npc_id)');
        $this->addSql('ALTER TABLE trade_screen ADD CONSTRAINT FK_E665DF22CA7D6B89 FOREIGN KEY (npc_id) REFERENCES npc (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE trade_screen ADD CONSTRAINT FK_E665DF22BF396750 FOREIGN KEY (id) REFERENCES screen (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE trade_screen DROP CONSTRAINT FK_E665DF22CA7D6B89');
        $this->addSql('ALTER TABLE trade_screen DROP CONSTRAINT FK_E665DF22BF396750');
        $this->addSql('DROP TABLE trade_screen');
    }
}
