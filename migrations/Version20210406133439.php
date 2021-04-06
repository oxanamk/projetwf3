<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210406133439 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE couleur (id INT AUTO_INCREMENT NOT NULL, couleur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE espece (id INT AUTO_INCREMENT NOT NULL, espece VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE choix');
        $this->addSql('ALTER TABLE announces ADD couleur_id INT NOT NULL, CHANGE animal_id espece_id INT NOT NULL');
        $this->addSql('ALTER TABLE announces ADD CONSTRAINT FK_3B879C652D191E7A FOREIGN KEY (espece_id) REFERENCES espece (id)');
        $this->addSql('ALTER TABLE announces ADD CONSTRAINT FK_3B879C65C31BA576 FOREIGN KEY (couleur_id) REFERENCES couleur (id)');
        $this->addSql('CREATE INDEX IDX_3B879C652D191E7A ON announces (espece_id)');
        $this->addSql('CREATE INDEX IDX_3B879C65C31BA576 ON announces (couleur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE announces DROP FOREIGN KEY FK_3B879C65C31BA576');
        $this->addSql('ALTER TABLE announces DROP FOREIGN KEY FK_3B879C652D191E7A');
        $this->addSql('CREATE TABLE choix (id INT AUTO_INCREMENT NOT NULL, espece VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, couleur VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE couleur');
        $this->addSql('DROP TABLE espece');
        $this->addSql('DROP INDEX IDX_3B879C652D191E7A ON announces');
        $this->addSql('DROP INDEX IDX_3B879C65C31BA576 ON announces');
        $this->addSql('ALTER TABLE announces ADD animal_id INT NOT NULL, DROP espece_id, DROP couleur_id');
    }
}
