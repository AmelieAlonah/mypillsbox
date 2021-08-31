<?php

namespace App\Tests\Entity\BACK;

use App\Entity\BACK\Allergen;
use App\Entity\BACK\Medicine;
use PHPUnit\Framework\TestCase;

class MedicineTest extends TestCase
{
    public function testMedicineIsTrue(): void
    {
        $medicine = new Medicine;
        $allergen = new Allergen;

        $medicine->setCodeCIS(123);
        $medicine->setName('Medicine');
        $medicine->setMedicType('MedicType');
        $medicine->setMedicCondition('MedicCondition');
        $medicine->setMedicDosage('MedicDosage');
        $medicine->setMedicExeption('MedicExeption');
        $medicine->setMedicMethodAdministration('MedicMethodAdministration');
        $medicine->setMedicDanger('MedicDanger');
        $medicine->setMedicDosageMax('MedicDosageMax');
        $medicine->setMedicInteractionOtherMedic('MedicInteractionOtherMedic');
        $medicine->setFertilyPregnancyBreastfeeding('FertilyPregnancyBreastfeeding');
        $medicine->setMedicAdverseReaction('MedicAdverseReaction');
        $medicine->setIdCPD(1);

        $this->assertTrue($medicine->getCodeCIS() === 123);
        $this->assertTrue($medicine->getName() === 'Medicine');
        $this->assertTrue($medicine->getMedicType() === 'MedicType');
        $this->assertTrue($medicine->getMedicCondition() === 'MedicCondition');
        $this->assertTrue($medicine->getMedicDosage() === 'MedicDosage');
        $this->assertTrue($medicine->getMedicExeption() === 'MedicExeption');
        $this->assertTrue($medicine->getMedicMethodAdministration() === 'MedicMethodAdministration');
        $this->assertTrue($medicine->getMedicDanger() === 'MedicDanger');
        $this->assertTrue($medicine->getMedicDosageMax() === 'MedicDosageMax');
        $this->assertTrue($medicine->getMedicInteractionOtherMedic() === 'MedicInteractionOtherMedic');
        $this->assertTrue($medicine->getFertilyPregnancyBreastfeeding() === 'FertilyPregnancyBreastfeeding');
        $this->assertTrue($medicine->getMedicAdverseReaction() === 'MedicAdverseReaction');
        $this->assertTrue($medicine->getIdCPD() === 1);
    }

    public function testMedicineIsFalse(): void
    {
        $medicine = new Medicine;
        $allergen = new Allergen;

        $medicine->setCodeCIS(123);
        $medicine->setName('Medicine');
        $medicine->setMedicType('MedicType');
        $medicine->setMedicCondition('MedicCondition');
        $medicine->setMedicDosage('MedicDosage');
        $medicine->setMedicExeption('MedicExeption');
        $medicine->setMedicMethodAdministration('MedicMethodAdministration');
        $medicine->setMedicDanger('MedicDanger');
        $medicine->setMedicDosageMax('MedicDosageMax');
        $medicine->setMedicInteractionOtherMedic('MedicInteractionOtherMedic');
        $medicine->setFertilyPregnancyBreastfeeding('FertilyPregnancyBreastfeeding');
        $medicine->setMedicAdverseReaction('MedicAdverseReaction');
        $medicine->setIdCPD(1);

        $this->assertFalse($medicine->getCodeCIS() === 12);
        $this->assertFalse($medicine->getName() === 'Medicin');
        $this->assertFalse($medicine->getMedicType() === 'MedicTyp');
        $this->assertFalse($medicine->getMedicCondition() === 'MedicConditio');
        $this->assertFalse($medicine->getMedicDosage() === 'MedicDosag');
        $this->assertFalse($medicine->getMedicExeption() === 'MedicExeptio');
        $this->assertFalse($medicine->getMedicMethodAdministration() === 'MedicMethodAdministratio');
        $this->assertFalse($medicine->getMedicDanger() === 'MedicDange');
        $this->assertFalse($medicine->getMedicDosageMax() === 'MedicDosageMa');
        $this->assertFalse($medicine->getMedicInteractionOtherMedic() === 'MedicInteractionOtherMedi');
        $this->assertFalse($medicine->getFertilyPregnancyBreastfeeding() === 'FertilyPregnancyBreastfeedin');
        $this->assertFalse($medicine->getMedicAdverseReaction() === 'MedicAdverseReactio');
        $this->assertFalse($medicine->getIdCPD() === 0);
        $this->assertNotContains($allergen, $medicine->getAllergens());
    }

    public function testMedicineIsEmpty(): void
    {
        $medicine = new Medicine;
        $allergen = new Allergen;

        $this->assertEmpty($medicine->getId());
        $this->assertEmpty($medicine->getCodeCIS());
        $this->assertEmpty($medicine->getName());
        $this->assertEmpty($medicine->getMedicType());
        $this->assertEmpty($medicine->getMedicCondition());
        $this->assertEmpty($medicine->getMedicDosage());
        $this->assertEmpty($medicine->getMedicExeption());
        $this->assertEmpty($medicine->getMedicMethodAdministration());
        $this->assertEmpty($medicine->getMedicDanger());
        $this->assertEmpty($medicine->getMedicDosageMax());
        $this->assertEmpty($medicine->getMedicInteractionOtherMedic());
        $this->assertEmpty($medicine->getFertilyPregnancyBreastfeeding());
        $this->assertEmpty($medicine->getMedicAdverseReaction());
        $this->assertEmpty($medicine->getIdCPD());
        $this->assertEmpty($medicine->__toString());
    }

    public function testAddRemoveAllergen(): void
    {
        $medicine = new Medicine;
        $allergen = new Allergen;

        $this->assertEmpty($medicine->getAllergens());

        $medicine->addAllergen($allergen);
        $this->assertContains($allergen, $medicine->getAllergens());

        $medicine->removeAllergen($allergen);
        $this->assertEmpty($medicine->getAllergens());

    }
}
