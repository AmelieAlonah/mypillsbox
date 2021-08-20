<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210819104050 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE medecine');
        $this->addSql('ALTER TABLE medicine ADD medic_condition LONGTEXT NOT NULL, ADD medic_dosage LONGTEXT NOT NULL, ADD medic_freq_dosage VARCHAR(255) NOT NULL, ADD medic_exeption LONGTEXT NOT NULL, ADD medic_method_administration LONGTEXT NOT NULL, ADD medic_danger LONGTEXT NOT NULL, ADD medic_warning LONGTEXT NOT NULL, ADD medic_dosage_max VARCHAR(255) NOT NULL, ADD medic_dosage_max_40 INT NOT NULL, ADD medic_dosage_max_50 INT NOT NULL, ADD medic_dosage_max_50_plus INT NOT NULL, ADD medic_usage_precaution LONGTEXT NOT NULL, ADD medic_interaction_other_medic LONGTEXT DEFAULT NULL, ADD medic_interaction_other_medic_id INT DEFAULT NULL, ADD fertily_pregnancy_breastfeeding LONGTEXT DEFAULT NULL, ADD fertily_pregnancy_breastfeeding_bool TINYINT(1) NOT NULL, ADD medic_effect_drive LONGTEXT DEFAULT NULL, ADD medic_effect_drive_bool TINYINT(1) NOT NULL, ADD medic_adverse_reaction LONGTEXT NOT NULL, ADD medic_overdose LONGTEXT NOT NULL, ADD medic_overdose_symptom LONGTEXT NOT NULL, ADD medic_overdose_behavior_overdose LONGTEXT NOT NULL, ADD prop_pharma_data LONGTEXT NOT NULL, ADD id_cpd INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE medecine (id INT AUTO_INCREMENT NOT NULL, allergen_id INT DEFAULT NULL, medic_type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, medic_condition LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, medic_dosage LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, medic_freq_dosage VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, medic_exeption LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, medic_method_administration LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, medic_danger LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, medic_warning LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, medic_dosage_max VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, medic_dosage_max_40 INT NOT NULL, medic_dosage_max_50 INT NOT NULL, medic_dosage_max_50_plus INT NOT NULL, medic_usage_precaution LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, medic_interaction_other_medic LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, medic_interaction_other_medic_id INT DEFAULT NULL, fertily_pregnancy_breastfeeding LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, fertily_pregnancy_breastfeeding_bool TINYINT(1) NOT NULL, medic_effect_drive LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, medic_effect_drive_bool TINYINT(1) NOT NULL, medic_adverse_reaction LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, medic_overdose LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, medic_overdose_symptom LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, medic_overdose_behavior_overdose LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prop_pharma_data LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, id_cpd INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE medicine DROP medic_condition, DROP medic_dosage, DROP medic_freq_dosage, DROP medic_exeption, DROP medic_method_administration, DROP medic_danger, DROP medic_warning, DROP medic_dosage_max, DROP medic_dosage_max_40, DROP medic_dosage_max_50, DROP medic_dosage_max_50_plus, DROP medic_usage_precaution, DROP medic_interaction_other_medic, DROP medic_interaction_other_medic_id, DROP fertily_pregnancy_breastfeeding, DROP fertily_pregnancy_breastfeeding_bool, DROP medic_effect_drive, DROP medic_effect_drive_bool, DROP medic_adverse_reaction, DROP medic_overdose, DROP medic_overdose_symptom, DROP medic_overdose_behavior_overdose, DROP prop_pharma_data, DROP id_cpd');
    }
}
