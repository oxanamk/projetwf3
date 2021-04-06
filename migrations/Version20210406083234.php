<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210406083234 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE announces ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE announces ADD CONSTRAINT FK_3B879C65A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_3B879C65A76ED395 ON announces (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE announces DROP FOREIGN KEY FK_3B879C65A76ED395');
        $this->addSql('DROP INDEX IDX_3B879C65A76ED395 ON announces');
        $this->addSql('ALTER TABLE announces DROP user_id');
    }
}
