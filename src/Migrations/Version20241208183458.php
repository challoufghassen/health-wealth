<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241208183458 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE appointment (id INT AUTO_INCREMENT NOT NULL, users_id INT DEFAULT NULL, schedule_id INT DEFAULT NULL, symptome VARCHAR(255) DEFAULT NULL, comments VARCHAR(255) DEFAULT NULL, status TINYINT(1) NOT NULL, INDEX IDX_FE38F84467B3B43D (users_id), INDEX IDX_FE38F844A40BC2D5 (schedule_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE doctor (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, date_de_naissance DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE schedule (id INT AUTO_INCREMENT NOT NULL, schedule_date DATETIME NOT NULL, schedule_day VARCHAR(255) NOT NULL, start_time TIME NOT NULL, end_time TIME NOT NULL, book_avail VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, activation_token VARCHAR(255) DEFAULT NULL, patient_nom VARCHAR(255) NOT NULL, patient_prenom VARCHAR(255) NOT NULL, patient_maritial_status VARCHAR(255) NOT NULL, patient_date_de_naissance DATETIME NOT NULL, sexe VARCHAR(255) NOT NULL, patient_phone VARCHAR(255) NOT NULL, patient_adresse VARCHAR(255) NOT NULL, patient_email VARCHAR(255) NOT NULL, reset_token VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_1483A5E9F85E0677 (username), UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F84467B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F844A40BC2D5 FOREIGN KEY (schedule_id) REFERENCES schedule (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appointment DROP FOREIGN KEY FK_FE38F84467B3B43D');
        $this->addSql('ALTER TABLE appointment DROP FOREIGN KEY FK_FE38F844A40BC2D5');
        $this->addSql('DROP TABLE appointment');
        $this->addSql('DROP TABLE doctor');
        $this->addSql('DROP TABLE schedule');
        $this->addSql('DROP TABLE users');
    }
}
