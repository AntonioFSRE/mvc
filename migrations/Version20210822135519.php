<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210822135519 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offer_applications ADD product_id INT NOT NULL');
        $this->addSql('ALTER TABLE offer_applications ADD CONSTRAINT FK_10F0694B4584665A FOREIGN KEY (product_id) REFERENCES product_applications (id)');
        $this->addSql('CREATE INDEX IDX_10F0694B4584665A ON offer_applications (product_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offer_applications DROP FOREIGN KEY FK_10F0694B4584665A');
        $this->addSql('DROP INDEX IDX_10F0694B4584665A ON offer_applications');
        $this->addSql('ALTER TABLE offer_applications DROP product_id');
    }
}
