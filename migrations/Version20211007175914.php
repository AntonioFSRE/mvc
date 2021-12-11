<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211007175914 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offer_applications CHANGE status_id status_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product_applications ADD status_id INT NOT NULL, DROP sold');
        $this->addSql('ALTER TABLE product_applications ADD CONSTRAINT FK_7A6D449B6BF700BD FOREIGN KEY (status_id) REFERENCES product_status (id)');
        $this->addSql('CREATE INDEX IDX_7A6D449B6BF700BD ON product_applications (status_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offer_applications CHANGE status_id status_id INT NOT NULL');
        $this->addSql('ALTER TABLE product_applications DROP FOREIGN KEY FK_7A6D449B6BF700BD');
        $this->addSql('DROP INDEX IDX_7A6D449B6BF700BD ON product_applications');
        $this->addSql('ALTER TABLE product_applications ADD sold TINYINT(1) DEFAULT \'0\' NOT NULL, DROP status_id');
    }
}
