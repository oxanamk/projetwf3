<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210404132034 extends AbstractMigration
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
        $this->addSql('CREATE TABLE announces_conditions_vie (announces_id INT NOT NULL, conditions_vie_id INT NOT NULL, INDEX IDX_722531686751F55 (announces_id), INDEX IDX_72253167E1A62BB (conditions_vie_id), PRIMARY KEY(announces_id, conditions_vie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact_us (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, email LONGTEXT NOT NULL, message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE announces_caracteres ADD CONSTRAINT FK_1A032C0686751F55 FOREIGN KEY (announces_id) REFERENCES announces (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE announces_caracteres ADD CONSTRAINT FK_1A032C06F41952E7 FOREIGN KEY (caracteres_id) REFERENCES caracteres (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE announces_conditions_vie ADD CONSTRAINT FK_722531686751F55 FOREIGN KEY (announces_id) REFERENCES announces (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE announces_conditions_vie ADD CONSTRAINT FK_72253167E1A62BB FOREIGN KEY (conditions_vie_id) REFERENCES conditions_vie (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE announces_caracteres DROP FOREIGN KEY FK_1A032C0686751F55');
        $this->addSql('ALTER TABLE announces_conditions_vie DROP FOREIGN KEY FK_722531686751F55');
        $this->addSql('DROP TABLE announces');
        $this->addSql('DROP TABLE announces_caracteres');
        $this->addSql('DROP TABLE announces_conditions_vie');
        $this->addSql('DROP TABLE contact_us');
    }
}
