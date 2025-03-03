<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250303090715 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE combat (id SERIAL NOT NULL, location_id INT NOT NULL, quest_id INT DEFAULT NULL, step_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, picture VARCHAR(255) NOT NULL, thumb VARCHAR(255) DEFAULT NULL, description TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8D51E39864D218E ON combat (location_id)');
        $this->addSql('CREATE INDEX IDX_8D51E398209E9EF4 ON combat (quest_id)');
        $this->addSql('CREATE INDEX IDX_8D51E39873B21E9C ON combat (step_id)');
        $this->addSql('ALTER TABLE combat ADD CONSTRAINT FK_8D51E39864D218E FOREIGN KEY (location_id) REFERENCES location (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE combat ADD CONSTRAINT FK_8D51E398209E9EF4 FOREIGN KEY (quest_id) REFERENCES quest (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE combat ADD CONSTRAINT FK_8D51E39873B21E9C FOREIGN KEY (step_id) REFERENCES step (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE combat DROP CONSTRAINT FK_8D51E39864D218E');
        $this->addSql('ALTER TABLE combat DROP CONSTRAINT FK_8D51E398209E9EF4');
        $this->addSql('ALTER TABLE combat DROP CONSTRAINT FK_8D51E39873B21E9C');
        $this->addSql('DROP TABLE combat');
    }
}
