<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250423194946 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE combat_screen (id INT NOT NULL, combat_id INT NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_70C85F59FC7EEDB8 ON combat_screen (combat_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE combat_screen ADD CONSTRAINT FK_70C85F59FC7EEDB8 FOREIGN KEY (combat_id) REFERENCES combat (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE combat_screen ADD CONSTRAINT FK_70C85F59BF396750 FOREIGN KEY (id) REFERENCES screen (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE combat_screen DROP CONSTRAINT FK_70C85F59FC7EEDB8
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE combat_screen DROP CONSTRAINT FK_70C85F59BF396750
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE combat_screen
        SQL);
    }
}
