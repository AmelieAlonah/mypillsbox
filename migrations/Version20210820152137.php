<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210820152137 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medicine DROP medic_dosage_max_40, DROP medic_dosage_max_50, DROP medic_dosage_max_50_plus');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medicine ADD medic_dosage_max_40 INT NOT NULL, ADD medic_dosage_max_50 INT NOT NULL, ADD medic_dosage_max_50_plus INT NOT NULL');
    }
}
