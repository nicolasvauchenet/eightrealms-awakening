<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250228102923 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER INDEX idx_4561d862727aca70 RENAME TO IDX_F18A1C39727ACA70');
        $this->addSql('ALTER INDEX idx_4561d862ca7d6b89 RENAME TO IDX_F18A1C39CA7D6B89');
        $this->addSql('ALTER TABLE dialogue_choice ADD type VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE dialogue_choice ADD picture VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER INDEX idx_d244886d5e46c4e2 RENAME TO IDX_B4FB4681A6E12CBD');
        $this->addSql('ALTER INDEX idx_3bad370f49891be4 RENAME TO IDX_3BAD370FE6D753B1');
        $this->addSql('ALTER INDEX idx_8df98859a6e12cbd RENAME TO IDX_8DF98859CA7D6B89');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE dialogue_choice DROP picture');
        $this->addSql('ALTER TABLE dialogue_choice DROP type');
        $this->addSql('ALTER INDEX idx_b4fb4681a6e12cbd RENAME TO idx_d244886d5e46c4e2');
        $this->addSql('ALTER INDEX idx_f18a1c39ca7d6b89 RENAME TO idx_4561d862ca7d6b89');
        $this->addSql('ALTER INDEX idx_f18a1c39727aca70 RENAME TO idx_4561d862727aca70');
        $this->addSql('ALTER INDEX idx_8df98859ca7d6b89 RENAME TO idx_8df98859a6e12cbd');
        $this->addSql('ALTER INDEX idx_3bad370fe6d753b1 RENAME TO idx_3bad370f49891be4');
    }
}
