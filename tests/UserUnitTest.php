<?php

namespace App\Tests;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $user = new User();

        $user->setEmail('true@test.com')
            ->setPrenom('prenom')
            ->setNom('nom')
            ->setPassword('password')
            ->setTelephone('0601020304')
            ->setAPropos('a propos')
            ->setFacebook('facebook');

        $this->assertTrue($user->getEmail() === 'true@test.com');
        $this->assertTrue($user->getPrenom() === 'prenom');
        $this->assertTrue($user->getNom() === 'nom');
        $this->assertTrue($user->getPassword() === 'password');
        $this->assertTrue($user->getTelephone() === '0601020304');
        $this->assertTrue($user->getAPropos() === 'a propos');
        $this->assertTrue($user->getFacebook() === 'facebook');
    }

    public function testIsFalse()
    {

        $user = new User();

        $user->setEmail('true@test.com')
            ->setPrenom('prenom')
            ->setNom('nom')
            ->setPassword('password')
            ->setTelephone('0601020304')
            ->setAPropos('a propos')
            ->setFacebook('facebook');

        $this->assertFalse($user->getEmail() === 'false@test.com');
        $this->assertFalse($user->getPrenom() === 'false');
        $this->assertFalse($user->getNom() === 'false');
        $this->assertFalse($user->getPassword() === 'false');
        $this->assertFalse($user->getTelephone() === 'false');
        $this->assertFalse($user->getAPropos() === 'false');
        $this->assertFalse($user->getFacebook() === 'false');
    }

    public function testIsEmpty()
    {

        $user = new User();

        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getPrenom());
        $this->assertEmpty($user->getNom());
        $this->assertEmpty($user->getPassword());
        $this->assertEmpty($user->getTelephone());
        $this->assertEmpty($user->getAPropos());
        $this->assertEmpty($user->getFacebook());
    }
}

