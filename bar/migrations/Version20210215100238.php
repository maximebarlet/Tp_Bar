<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210215100238 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE beer_category (beer_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_CC90155FD0989053 (beer_id), INDEX IDX_CC90155F12469DE2 (category_id), PRIMARY KEY(beer_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE beer_category ADD CONSTRAINT FK_CC90155FD0989053 FOREIGN KEY (beer_id) REFERENCES beers (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE beer_category ADD CONSTRAINT FK_CC90155F12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE beers ADD price DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE country CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE adress address LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE beer_category DROP FOREIGN KEY FK_CC90155F12469DE2');
        $this->addSql('DROP TABLE beer_category');
        $this->addSql('DROP TABLE category');
        $this->addSql('ALTER TABLE beers DROP price');
        $this->addSql('ALTER TABLE country CHANGE email email VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE address adress LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
