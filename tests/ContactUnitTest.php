<?php

namespace App\Tests;

use App\Entity\Contact;


use DateTime;

use PHPUnit\Framework\TestCase;

class ContactUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $contact = new Contact();
        $datetime = new DateTime();

        $contact->setNom('nom')
            ->setEmail('true@test.com')
            ->setObjet('objet')
            ->setMessage('message')
            ->setCreatedAt($datetime);

        $this->assertTrue($contact->getNom() === 'nom');
        $this->assertTrue($contact->getEmail() === 'true@test.com');
        $this->assertTrue($contact->getObjet() === 'objet');
        $this->assertTrue($contact->getMessage() === 'message');
        $this->assertTrue($contact->getCreatedAt() === $datetime);
    }

    public function testisFalse()
    {
        $contact = new Contact();
        $datetime = new DateTime();


        $contact->setNom('nom')
            ->setEmail('true@test.com')
            ->setObjet('objet')
            ->setMessage('message')
            ->setCreatedAt($datetime);

        $this->assertFalse($contact->getNom() === 'false');
        $this->assertFalse($contact->getEmail() === 'false');
        $this->assertFalse($contact->getObjet() === 'false');
        $this->assertFalse($contact->getMessage() === 'false');
        $this->assertFalse($contact->getCreatedAt() === new DateTime());

    }

    public function testisEmpty()
    {
        $contact = new Contact();

        $this->assertEmpty($contact->getNom());
        $this->assertEmpty($contact->getEmail());
        $this->assertEmpty($contact->getObjet());
        $this->assertEmpty($contact->getMessage());
        $this->assertEmpty($contact->getCreatedAt());

    }

}

