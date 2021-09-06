<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210824190910 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE IF NOT EXISTS allergens_medicines (medicine_id INT NOT NULL, allergen_id INT NOT NULL, INDEX IDX_EC4D6E352F7D140A (medicine_id), INDEX IDX_EC4D6E356E775A4A (allergen_id), PRIMARY KEY(medicine_id, allergen_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE allergens_medicines ADD CONSTRAINT FK_EC4D6E352F7D140A FOREIGN KEY (medicine_id) REFERENCES medicine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE allergens_medicines ADD CONSTRAINT FK_EC4D6E356E775A4A FOREIGN KEY (allergen_id) REFERENCES allergen (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE medicine_allergen');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE IF NOT EXISTS medicine_allergen (medicine_id INT NOT NULL, allergen_id INT NOT NULL, INDEX IDX_DFBDCEDA2F7D140A (medicine_id), INDEX IDX_DFBDCEDA6E775A4A (allergen_id), PRIMARY KEY(medicine_id, allergen_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE medicine_allergen ADD CONSTRAINT FK_DFBDCEDA2F7D140A FOREIGN KEY (medicine_id) REFERENCES medicine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE medicine_allergen ADD CONSTRAINT FK_DFBDCEDA6E775A4A FOREIGN KEY (allergen_id) REFERENCES allergen (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE allergens_medicines');
    }
}
