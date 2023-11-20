<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231120115928 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cadastre (cadastre_id INT AUTO_INCREMENT NOT NULL, district_id INT NOT NULL, nomenclature_id INT NOT NULL, purpose_id INT NOT NULL, year_cadastre_add INT NOT NULL, actualize_at DATE DEFAULT NULL, cadastre_number VARCHAR(255) NOT NULL, address LONGTEXT NOT NULL, drilling_number VARCHAR(255) DEFAULT NULL, drilling_start INT DEFAULT NULL, drilling_end INT DEFAULT NULL, report LONGTEXT DEFAULT NULL, depth NUMERIC(6, 3) DEFAULT NULL, mouth NUMERIC(6, 3) DEFAULT NULL, `limit` NUMERIC(6, 3) DEFAULT NULL, horizon_number_1 VARCHAR(5) DEFAULT NULL, horizon_number_2 VARCHAR(5) DEFAULT NULL, test_date DATE DEFAULT NULL, no_water INT NOT NULL, INDEX IDX_2B136D8CB08FA272 (district_id), INDEX IDX_2B136D8C90BFD4B8 (nomenclature_id), INDEX IDX_2B136D8C7FC21131 (purpose_id), PRIMARY KEY(cadastre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cadastre_found (cadastre_id INT NOT NULL, found_id INT NOT NULL, INDEX IDX_A4D201C5DA8373CB (cadastre_id), INDEX IDX_A4D201C55EF16371 (found_id), PRIMARY KEY(cadastre_id, found_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cadastre_target (cadastre_id INT NOT NULL, target_id INT NOT NULL, INDEX IDX_14F39110DA8373CB (cadastre_id), INDEX IDX_14F39110158E0B66 (target_id), PRIMARY KEY(cadastre_id, target_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE catalog (catalog_id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, type INT NOT NULL, title LONGTEXT DEFAULT NULL, INDEX IDX_1B2C3247727ACA70 (parent_id), PRIMARY KEY(catalog_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cadastre ADD CONSTRAINT FK_2B136D8CB08FA272 FOREIGN KEY (district_id) REFERENCES catalog (catalog_id) ON DELETE RESTRICT');
        $this->addSql('ALTER TABLE cadastre ADD CONSTRAINT FK_2B136D8C90BFD4B8 FOREIGN KEY (nomenclature_id) REFERENCES catalog (catalog_id) ON DELETE RESTRICT');
        $this->addSql('ALTER TABLE cadastre ADD CONSTRAINT FK_2B136D8C7FC21131 FOREIGN KEY (purpose_id) REFERENCES catalog (catalog_id) ON DELETE RESTRICT');
        $this->addSql('ALTER TABLE cadastre_found ADD CONSTRAINT FK_A4D201C5DA8373CB FOREIGN KEY (cadastre_id) REFERENCES cadastre (cadastre_id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cadastre_found ADD CONSTRAINT FK_A4D201C55EF16371 FOREIGN KEY (found_id) REFERENCES catalog (catalog_id) ON DELETE RESTRICT');
        $this->addSql('ALTER TABLE cadastre_target ADD CONSTRAINT FK_14F39110DA8373CB FOREIGN KEY (cadastre_id) REFERENCES cadastre (cadastre_id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cadastre_target ADD CONSTRAINT FK_14F39110158E0B66 FOREIGN KEY (target_id) REFERENCES catalog (catalog_id) ON DELETE RESTRICT');
        $this->addSql('ALTER TABLE catalog ADD CONSTRAINT FK_1B2C3247727ACA70 FOREIGN KEY (parent_id) REFERENCES catalog (catalog_id) ON DELETE RESTRICT');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cadastre DROP FOREIGN KEY FK_2B136D8CB08FA272');
        $this->addSql('ALTER TABLE cadastre DROP FOREIGN KEY FK_2B136D8C90BFD4B8');
        $this->addSql('ALTER TABLE cadastre DROP FOREIGN KEY FK_2B136D8C7FC21131');
        $this->addSql('ALTER TABLE cadastre_found DROP FOREIGN KEY FK_A4D201C5DA8373CB');
        $this->addSql('ALTER TABLE cadastre_found DROP FOREIGN KEY FK_A4D201C55EF16371');
        $this->addSql('ALTER TABLE cadastre_target DROP FOREIGN KEY FK_14F39110DA8373CB');
        $this->addSql('ALTER TABLE cadastre_target DROP FOREIGN KEY FK_14F39110158E0B66');
        $this->addSql('ALTER TABLE catalog DROP FOREIGN KEY FK_1B2C3247727ACA70');
        $this->addSql('DROP TABLE cadastre');
        $this->addSql('DROP TABLE cadastre_found');
        $this->addSql('DROP TABLE cadastre_target');
        $this->addSql('DROP TABLE catalog');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
