<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210926171242 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_applications CHANGE starting_price `integer` VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE product_applications ADD CONSTRAINT FK_7A6D449B38248176 FOREIGN KEY (currency_id) REFERENCES currency (id)');
        $this->addSql('CREATE INDEX IDX_7A6D449B38248176 ON product_applications (currency_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_applications DROP FOREIGN KEY FK_7A6D449B38248176');
        $this->addSql('DROP INDEX IDX_7A6D449B38248176 ON product_applications');
        $this->addSql('ALTER TABLE product_applications CHANGE `integer` starting_price VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
