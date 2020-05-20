<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200520093249 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE betaal (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, soort VARCHAR(255) NOT NULL, rekeningnummer VARCHAR(255) NOT NULL, betaal_date DATE NOT NULL, betaal_id DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE extras (id INT AUTO_INCREMENT NOT NULL, kamer_id_id INT DEFAULT NULL, omschrijving VARCHAR(255) NOT NULL, meerprijs DOUBLE PRECISION NOT NULL, INDEX IDX_269B65D12C391598 (kamer_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, kamer_id_id INT DEFAULT NULL, image_file VARCHAR(255) NOT NULL, INDEX IDX_C53D045F2C391598 (kamer_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE kamer (id INT AUTO_INCREMENT NOT NULL, soort_id_id INT DEFAULT NULL, prijs DOUBLE PRECISION NOT NULL, INDEX IDX_4DD4F6A61D9D252B (soort_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservering (id INT AUTO_INCREMENT NOT NULL, kamer_id_id INT DEFAULT NULL, chechkin_date DATE NOT NULL, checkout_date DATE NOT NULL, betaal_methode VARCHAR(255) NOT NULL, INDEX IDX_F2E439AC2C391598 (kamer_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seizoen (id INT AUTO_INCREMENT NOT NULL, omschrijving VARCHAR(255) NOT NULL, begin_datum DATE NOT NULL, eind_datum DATE NOT NULL, korting VARCHAR(3) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE soort (id INT AUTO_INCREMENT NOT NULL, omschrijving VARCHAR(255) NOT NULL, meerprijs DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE extras ADD CONSTRAINT FK_269B65D12C391598 FOREIGN KEY (kamer_id_id) REFERENCES kamer (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F2C391598 FOREIGN KEY (kamer_id_id) REFERENCES kamer (id)');
        $this->addSql('ALTER TABLE kamer ADD CONSTRAINT FK_4DD4F6A61D9D252B FOREIGN KEY (soort_id_id) REFERENCES soort (id)');
        $this->addSql('ALTER TABLE reservering ADD CONSTRAINT FK_F2E439AC2C391598 FOREIGN KEY (kamer_id_id) REFERENCES kamer (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE extras DROP FOREIGN KEY FK_269B65D12C391598');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F2C391598');
        $this->addSql('ALTER TABLE reservering DROP FOREIGN KEY FK_F2E439AC2C391598');
        $this->addSql('ALTER TABLE kamer DROP FOREIGN KEY FK_4DD4F6A61D9D252B');
        $this->addSql('DROP TABLE betaal');
        $this->addSql('DROP TABLE extras');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE kamer');
        $this->addSql('DROP TABLE reservering');
        $this->addSql('DROP TABLE seizoen');
        $this->addSql('DROP TABLE soort');
    }
}
