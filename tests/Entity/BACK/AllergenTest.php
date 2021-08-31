<?php

namespace App\Tests\Entity\BACK;

use App\Entity\BACK\User;
use App\Entity\BACK\Allergen;
use App\Entity\BACK\Medicine;
use PHPUnit\Framework\TestCase;

class AllergenTest extends TestCase
{
    public function testAllergenIsTrue(): void
    {
        $allergen = new Allergen();
        $user = new User();

        $allergen->setName('Allergen');
        $allergen->setUser($user);
        
        $this->assertTrue($allergen->getName() === 'Allergen');
        $this->assertTrue($allergen->getUser() === $user);
        $this->assertTrue($allergen->getId() === $allergen->getId());
    }

    public function testAllergenIsFalse(): void
    {
        $allergen = new Allergen();
        $user = new User();

        $allergen->setName('Allergen');
        $allergen->setUser($user);
        
        $this->assertFalse($allergen->getName() === 'False');
        $this->assertFalse($allergen->getUser() === 'User');
        $this->assertFalse($allergen->getId() === !$allergen->getId());
    }

    public function testAllergenIsEmpty(): void
    {
        $allergen = new Allergen();

        $this->assertEmpty($allergen->getName());
        $this->assertEmpty($allergen->__toString());
    }

    public function testAllergenAddGetRemoveMedicine(): void
    {
        $allergen = new Allergen();
        $medicines = new Medicine();

        $this->assertEmpty($allergen->getMedicines());

        $allergen->addMedicine($medicines);
        $this->assertContains($medicines, $allergen->getMedicines());

        $allergen->removeMedicine($medicines);
        $this->assertEmpty($allergen->getMedicines());

    }

}
