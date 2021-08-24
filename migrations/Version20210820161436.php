<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210820161436 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medicine CHANGE code_cis code_cis INT DEFAULT NULL, CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE medic_compo medic_compo VARCHAR(255) DEFAULT NULL, CHANGE medic_type medic_type VARCHAR(255) DEFAULT NULL, CHANGE medic_condition medic_condition LONGTEXT DEFAULT NULL, CHANGE medic_dosage medic_dosage LONGTEXT DEFAULT NULL, CHANGE medic_exeption medic_exeption LONGTEXT DEFAULT NULL, CHANGE medic_method_administration medic_method_administration LONGTEXT DEFAULT NULL, CHANGE medic_danger medic_danger LONGTEXT DEFAULT NULL, CHANGE medic_dosage_max medic_dosage_max VARCHAR(255) DEFAULT NULL, CHANGE medic_adverse_reaction medic_adverse_reaction LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medicine CHANGE code_cis code_cis INT NOT NULL, CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE medic_compo medic_compo VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE medic_type medic_type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE medic_condition medic_condition LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE medic_dosage medic_dosage LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE medic_exeption medic_exeption LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE medic_method_administration medic_method_administration LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE medic_danger medic_danger LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE medic_dosage_max medic_dosage_max VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE medic_adverse_reaction medic_adverse_reaction LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
