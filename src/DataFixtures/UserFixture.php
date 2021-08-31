<?php

namespace App\DataFixtures;

use App\Entity\BACK\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

/**
 * @codeCoverageIgnore
 */
class UserFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();

        $user->setEmail('admin@admin.fr');
        $user->setPassword('amelie');
        
        $manager->persist($user);

        $manager->flush();
    }
}
