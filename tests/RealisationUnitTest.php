<?php

namespace App\Tests;

use App\Entity\Categorie;
use App\Entity\Realisation;
use App\Entity\User;
use DateTime;

use PHPUnit\Framework\TestCase;

class RealisationUnitTest extends TestCase
{
    public function testisTrue()
    {
        $realisation = new Realisation;
        $datetime = new DateTime();
        $categorie = new Categorie();
        $user = new User();


        $realisation->setNom('nom')
            ->setDateRealisation($datetime)
            ->setCreatedAt($datetime)
            ->setDescription('description')
            ->setPortfolio(true)
            ->setSlug('slug')
            ->setFile('file')
            ->addCategorie($categorie)
            ->setUser($user);

        $this->assertTrue($realisation->getNom() === 'nom');
        $this->assertTrue($realisation->getDateRealisation() === $datetime);
        $this->assertTrue($realisation->getCreatedAt() === $datetime);
        $this->assertTrue($realisation->getDescription() === 'description');
        $this->assertTrue($realisation->getPortfolio() === true);
        $this->assertTrue($realisation->getSlug() === 'slug');
        $this->assertTrue($realisation->getFile() === 'file');
        $this->assertContains($categorie, $realisation->getCategorie());
        $this->assertTrue($realisation->getUser() === $user);
    }
    public function testisFalse()
    {
        $realisation = new Realisation();
        $datetime = new DateTime();
        $categorie = new Categorie();
        $user = new User();

        $realisation->setNom('nom')
            ->setDateRealisation($datetime)
            ->setCreatedAt($datetime)
            ->setDescription('description')
            ->setPortfolio(true)
            ->setSlug('slug')
            ->setFile('file')
            ->addCategorie($categorie)
            ->setUser($user);

        $this->assertFalse($realisation->getNom() === 'false');

        $this->assertFalse($realisation->getDateRealisation() === new DateTime());
        $this->assertFalse($realisation->getCreatedAt() === new DateTime());
        $this->assertFalse($realisation->getDescription() === 'false');
        $this->assertFalse($realisation->getPortfolio() === false);
        $this->assertFalse($realisation->getSlug() === 'false');
        $this->assertFalse($realisation->getFile() === 'false');
        $this->assertNotContains(new Categorie(), $realisation->getCategorie());
        $this->assertFalse($realisation->getUser() === new User());

    }

    public function testisEmpty()
    {
        $realisation = new Realisation();

        $this->assertEmpty($realisation->getNom());
        $this->assertEmpty($realisation->getDateRealisation());
        $this->assertEmpty($realisation->getCreatedAt());
        $this->assertEmpty($realisation->getDescription());
        $this->assertEmpty($realisation->getPortfolio());
        $this->assertEmpty($realisation->getSlug());
        $this->assertEmpty($realisation->getFile());
        $this->assertEmpty($realisation->getCategorie());
        $this->assertEmpty($realisation->getUser());

    }

}


