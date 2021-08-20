<?php

namespace App\DataFixtures;

use App\Entity\BACK\Medicine;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MedicineFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($index = 1; $index <= 15; $index++)
        {
            $medicine = new Medicine();
            
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
