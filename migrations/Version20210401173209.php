<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210401173209 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE announces (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(150) NOT NULL, nom VARCHAR(200) NOT NULL, age INT NOT NULL, image LONGTEXT NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE announces_caracteres (announces_id INT NOT NULL, caracteres_id INT NOT NULL, INDEX IDX_1A032C0686751F55 (announces_id), INDEX IDX_1A032C06F41952E7 (caracteres_id), PRIMARY KEY(announces_id, caracteres_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE announces_conditionsvie (announces_id INT NOT NULL, conditionsvie_id INT NOT NULL, INDEX IDX_B38D409D86751F55 (announces_id), INDEX IDX_B38D409DF2E010D4 (conditionsvie_id), PRIMARY KEY(announces_id, conditionsvie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE caracteres (id INT AUTO_INCREMENT NOT NULL, espiegle TINYINT(1) DEFAULT NULL, fertile TINYINT(1) DEFAULT NULL, aimant TINYINT(1) DEFAULT NULL, familial TINYINT(1) DEFAULT NULL, mignon TINYINT(1) DEFAULT NULL, obeissant TINYINT(1) DEFAULT NULL, independant TINYINT(1) DEFAULT NULL, protecteur TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conditions_vie (id INT AUTO_INCREMENT NOT NULL, ville TINYINT(1) DEFAULT NULL, campagne TINYINT(1) DEFAULT NULL, famille TINYINT(1) DEFAULT NULL, amenagement TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE announces_caracteres ADD CONSTRAINT FK_1A032C0686751F55 FOREIGN KEY (announces_id) REFERENCES announces (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE announces_caracteres ADD CONSTRAINT FK_1A032C06F41952E7 FOREIGN KEY (caracteres_id) REFERENCES caracteres (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE announces_conditionsvie ADD CONSTRAINT FK_B38D409D86751F55 FOREIGN KEY (announces_id) REFERENCES announces (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE announces_conditionsvie ADD CONSTRAINT FK_B38D409DF2E010D4 FOREIGN KEY (conditionsvie_id) REFERENCES conditions_vie (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE announces_caracteres DROP FOREIGN KEY FK_1A032C0686751F55');
        $this->addSql('ALTER TABLE announces_conditionsvie DROP FOREIGN KEY FK_B38D409D86751F55');
        $this->addSql('ALTER TABLE announces_caracteres DROP FOREIGN KEY FK_1A032C06F41952E7');
        $this->addSql('ALTER TABLE announces_conditionsvie DROP FOREIGN KEY FK_B38D409DF2E010D4');
        $this->addSql('DROP TABLE announces');
        $this->addSql('DROP TABLE announces_caracteres');
        $this->addSql('DROP TABLE announces_conditionsvie');
        $this->addSql('DROP TABLE caracteres');
        $this->addSql('DROP TABLE conditions_vie');
    }
}
