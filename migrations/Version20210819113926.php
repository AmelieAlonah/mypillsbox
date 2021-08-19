<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210819113926 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE medicine (id INT AUTO_INCREMENT NOT NULL, code_cis INT NOT NULL, medic_notice LONGTEXT NOT NULL, name VARCHAR(255) NOT NULL, medic_compo VARCHAR(255) NOT NULL, allergen_id VARCHAR(255) DEFAULT NULL, medic_type VARCHAR(255) NOT NULL, medic_condition LONGTEXT NOT NULL, medic_dosage LONGTEXT NOT NULL, medic_freq_dosage VARCHAR(255) NOT NULL, medic_exeption LONGTEXT NOT NULL, medic_method_administration LONGTEXT NOT NULL, medic_danger LONGTEXT NOT NULL, medic_warning LONGTEXT NOT NULL, medic_dosage_max VARCHAR(255) NOT NULL, medic_dosage_max_40 INT NOT NULL, medic_dosage_max_50 INT NOT NULL, medic_dosage_max_50_plus INT NOT NULL, medic_usage_precaution LONGTEXT NOT NULL, medic_interaction_other_medic LONGTEXT DEFAULT NULL, medic_interaction_other_medic_id INT DEFAULT NULL, fertily_pregnancy_breastfeeding LONGTEXT DEFAULT NULL, fertily_pregnancy_breastfeeding_bool TINYINT(1) NOT NULL, medic_effect_drive LONGTEXT DEFAULT NULL, medic_effect_drive_bool TINYINT(1) NOT NULL, medic_adverse_reaction LONGTEXT NOT NULL, medic_overdose LONGTEXT NOT NULL, medic_overdose_symptom LONGTEXT NOT NULL, medic_overdose_behavior_overdose LONGTEXT NOT NULL, prop_pharma_data LONGTEXT NOT NULL, id_cpd VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE medicine');
    }
}
