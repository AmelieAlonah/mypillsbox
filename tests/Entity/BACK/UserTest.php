<?php

namespace App\Tests\Entity\BACK;

use App\Entity\BACK\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testUserIsTrue(): void
    {
        $user = new User;
        $roles[] = 'ROLE_USER';

        $user->setEmail('email@email.fr');
        $user->setRoles($roles);
        $user->setPassword('Password');

        $this->assertTrue($user->getEmail() === 'email@email.fr');
        $this->assertTrue($user->getRoles() === $roles);
        $this->assertTrue($user->getPassword() === 'Password');
        $this->assertTrue($user->getUserIdentifier() === $user->getEmail());
        $this->assertTrue($user->getUsername() === $user->getEmail());
        $this->assertTrue($user->getSalt() === null);
    }

    public function testUserIsFalse(): void
    {
        $user = new User;
        $roles[] = 'ROLE_USER';

        $user->setEmail('email@email.fr');
        $user->setRoles($roles);
        $user->setPassword('Password');

        $this->assertFalse($user->getEmail() === !'email@email.fr');
        $this->assertFalse($user->getRoles() === !$roles);
        $this->assertFalse($user->getPassword() === !'Password');
        $this->assertFalse($user->getUserIdentifier() === !$user->getEmail());
        $this->assertFalse($user->getUsername() === !$user->getEmail());
        $this->assertFalse($user->getSalt() === !null);
    }

    public function testUserIsEmpty(): void
    {
        $user = new User;

        $this->assertEmpty($user->getId());
        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getUserIdentifier());
        $this->assertEmpty($user->getUsername());
        $this->assertEmpty($user->getSalt());
    }
}
