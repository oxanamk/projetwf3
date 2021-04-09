<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210407082120 extends AbstractMigration
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
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE announces ADD user_id INT DEFAULT NULL, ADD espece_id INT NOT NULL, ADD couleur_id INT NOT NULL, ADD tel VARCHAR(15) NOT NULL, ADD email VARCHAR(255) NOT NULL, ADD titre VARCHAR(255) NOT NULL, ADD statut VARCHAR(255) NOT NULL, ADD date DATE NOT NULL');
        $this->addSql('ALTER TABLE announces ADD CONSTRAINT FK_3B879C65A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE announces ADD CONSTRAINT FK_3B879C652D191E7A FOREIGN KEY (espece_id) REFERENCES espece (id)');
        $this->addSql('ALTER TABLE announces ADD CONSTRAINT FK_3B879C65C31BA576 FOREIGN KEY (couleur_id) REFERENCES couleur (id)');
        $this->addSql('CREATE INDEX IDX_3B879C65A76ED395 ON announces (user_id)');
        $this->addSql('CREATE INDEX IDX_3B879C652D191E7A ON announces (espece_id)');
        $this->addSql('CREATE INDEX IDX_3B879C65C31BA576 ON announces (couleur_id)');
        $this->addSql('ALTER TABLE users ADD roles JSON NOT NULL, ADD pseudo VARCHAR(255) NOT NULL, ADD statut VARCHAR(255) NOT NULL, ADD image LONGTEXT DEFAULT NULL, ADD description LONGTEXT DEFAULT NULL, DROP username, CHANGE email email VARCHAR(180) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9E7927C74 ON users (email)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE announces DROP FOREIGN KEY FK_3B879C65C31BA576');
        $this->addSql('ALTER TABLE announces DROP FOREIGN KEY FK_3B879C652D191E7A');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, roles JSON NOT NULL, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, pseudo VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, statut VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE couleur');
        $this->addSql('DROP TABLE espece');
        $this->addSql('ALTER TABLE announces DROP FOREIGN KEY FK_3B879C65A76ED395');
        $this->addSql('DROP INDEX IDX_3B879C65A76ED395 ON announces');
        $this->addSql('DROP INDEX IDX_3B879C652D191E7A ON announces');
        $this->addSql('DROP INDEX IDX_3B879C65C31BA576 ON announces');
        $this->addSql('ALTER TABLE announces DROP user_id, DROP espece_id, DROP couleur_id, DROP tel, DROP email, DROP titre, DROP statut, DROP date');
        $this->addSql('DROP INDEX UNIQ_1483A5E9E7927C74 ON users');
        $this->addSql('ALTER TABLE users ADD username VARCHAR(150) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP roles, DROP pseudo, DROP statut, DROP image, DROP description, CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}