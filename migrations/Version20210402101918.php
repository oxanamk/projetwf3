<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210402101918 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE conditions_vie ADD type VARCHAR(255) NOT NULL, ADD image LONGTEXT NOT NULL, DROP ville, DROP campagne, DROP famille, DROP amenagement');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE conditions_vie ADD ville TINYINT(1) DEFAULT NULL, ADD campagne TINYINT(1) DEFAULT NULL, ADD famille TINYINT(1) DEFAULT NULL, ADD amenagement TINYINT(1) DEFAULT NULL, DROP type, DROP image');
    }
}
