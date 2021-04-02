<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210402134708 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE announces_caracteres DROP FOREIGN KEY FK_1A032C0686751F55');
        $this->addSql('ALTER TABLE announces_conditions_vie DROP FOREIGN KEY FK_722531686751F55');
        $this->addSql('ALTER TABLE announces_caracteres DROP FOREIGN KEY FK_1A032C06F41952E7');
        $this->addSql('ALTER TABLE announces_conditions_vie DROP FOREIGN KEY FK_72253167E1A62BB');
        $this->addSql('CREATE TABLE annonces (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(255) NOT NULL, age INT NOT NULL, nom VARCHAR(255) NOT NULL, image LONGTEXT NOT NULL, description LONGTEXT NOT NULL, qualites VARCHAR(255) NOT NULL, qualites2 VARCHAR(255) NOT NULL, qualites3 VARCHAR(255) NOT NULL, conditions VARCHAR(255) NOT NULL, conditions2 VARCHAR(255) NOT NULL, conditions3 VARCHAR(255) NOT NULL, tel INT NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE announces');
        $this->addSql('DROP TABLE announces_caracteres');
        $this->addSql('DROP TABLE announces_conditions_vie');
        $this->addSql('DROP TABLE caracteres');
        $this->addSql('DROP TABLE conditions_vie');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE announces (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(150) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, nom VARCHAR(200) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, age INT NOT NULL, image LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE announces_caracteres (announces_id INT NOT NULL, caracteres_id INT NOT NULL, INDEX IDX_1A032C0686751F55 (announces_id), INDEX IDX_1A032C06F41952E7 (caracteres_id), PRIMARY KEY(announces_id, caracteres_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE announces_conditions_vie (announces_id INT NOT NULL, conditions_vie_id INT NOT NULL, INDEX IDX_722531686751F55 (announces_id), INDEX IDX_72253167E1A62BB (conditions_vie_id), PRIMARY KEY(announces_id, conditions_vie_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE caracteres (id INT AUTO_INCREMENT NOT NULL, nom_caractere VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, image LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE conditions_vie (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, image LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE announces_caracteres ADD CONSTRAINT FK_1A032C0686751F55 FOREIGN KEY (announces_id) REFERENCES announces (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE announces_caracteres ADD CONSTRAINT FK_1A032C06F41952E7 FOREIGN KEY (caracteres_id) REFERENCES caracteres (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE announces_conditions_vie ADD CONSTRAINT FK_72253167E1A62BB FOREIGN KEY (conditions_vie_id) REFERENCES conditions_vie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE announces_conditions_vie ADD CONSTRAINT FK_722531686751F55 FOREIGN KEY (announces_id) REFERENCES announces (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE annonces');
    }
}
