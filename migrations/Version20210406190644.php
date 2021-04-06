<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210406190644 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE announces ADD CONSTRAINT FK_3B879C652D191E7A FOREIGN KEY (espece_id) REFERENCES espece (id)');
        $this->addSql('ALTER TABLE announces ADD CONSTRAINT FK_3B879C65C31BA576 FOREIGN KEY (couleur_id) REFERENCES couleur (id)');
        $this->addSql('CREATE INDEX IDX_3B879C652D191E7A ON announces (espece_id)');
        $this->addSql('CREATE INDEX IDX_3B879C65C31BA576 ON announces (couleur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE announces DROP FOREIGN KEY FK_3B879C652D191E7A');
        $this->addSql('ALTER TABLE announces DROP FOREIGN KEY FK_3B879C65C31BA576');
        $this->addSql('DROP INDEX IDX_3B879C652D191E7A ON announces');
        $this->addSql('DROP INDEX IDX_3B879C65C31BA576 ON announces');
    }
}
