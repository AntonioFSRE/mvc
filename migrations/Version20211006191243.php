<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211006191243 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE offer_status (id INT AUTO_INCREMENT NOT NULL, offer_status VARCHAR(225) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_status (id INT AUTO_INCREMENT NOT NULL, product_status VARCHAR(225) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE offer_applications CHANGE currency_id currency_id INT DEFAULT NULL, CHANGE accepted accepted INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE product_applications CHANGE currency_id currency_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE offer_status');
        $this->addSql('DROP TABLE product_status');
        $this->addSql('ALTER TABLE offer_applications CHANGE currency_id currency_id INT NOT NULL, CHANGE accepted accepted TINYINT(1) DEFAULT \'0\' NOT NULL');
        $this->addSql('ALTER TABLE product_applications CHANGE currency_id currency_id INT NOT NULL');
    }
}
