<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210402101342 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE announces_conditions_vie (announces_id INT NOT NULL, conditions_vie_id INT NOT NULL, INDEX IDX_722531686751F55 (announces_id), INDEX IDX_72253167E1A62BB (conditions_vie_id), PRIMARY KEY(announces_id, conditions_vie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE announces_conditions_vie ADD CONSTRAINT FK_722531686751F55 FOREIGN KEY (announces_id) REFERENCES announces (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE announces_conditions_vie ADD CONSTRAINT FK_72253167E1A62BB FOREIGN KEY (conditions_vie_id) REFERENCES conditions_vie (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE announces_conditionsvie');
        $this->addSql('ALTER TABLE caracteres ADD nom_caractere VARCHAR(255) NOT NULL, DROP espiegle, DROP fertile, DROP aimant, DROP familial, DROP mignon, DROP obeissant, DROP independant, DROP protecteur');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE announces_conditionsvie (announces_id INT NOT NULL, conditionsvie_id INT NOT NULL, INDEX IDX_B38D409D86751F55 (announces_id), INDEX IDX_B38D409DF2E010D4 (conditionsvie_id), PRIMARY KEY(announces_id, conditionsvie_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE announces_conditionsvie ADD CONSTRAINT FK_B38D409D86751F55 FOREIGN KEY (announces_id) REFERENCES announces (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE announces_conditionsvie ADD CONSTRAINT FK_B38D409DF2E010D4 FOREIGN KEY (conditionsvie_id) REFERENCES conditions_vie (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE announces_conditions_vie');
        $this->addSql('ALTER TABLE caracteres ADD espiegle TINYINT(1) DEFAULT NULL, ADD fertile TINYINT(1) DEFAULT NULL, ADD aimant TINYINT(1) DEFAULT NULL, ADD familial TINYINT(1) DEFAULT NULL, ADD mignon TINYINT(1) DEFAULT NULL, ADD obeissant TINYINT(1) DEFAULT NULL, ADD independant TINYINT(1) DEFAULT NULL, ADD protecteur TINYINT(1) DEFAULT NULL, DROP nom_caractere');
    }
}
