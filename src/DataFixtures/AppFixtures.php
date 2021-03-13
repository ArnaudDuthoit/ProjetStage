<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Contact;
use App\Entity\Realisation;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{

    private UserPasswordEncoderInterface $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        // Utilisation de Faker
        $faker = Factory::create('fr_FR');

        $user = new User();

        $user->setEmail('user@test.com')
            ->setPrenom($faker->firstName())
            ->setNom($faker->lastName())
            ->setTelephone($faker->phoneNumber())
            ->setAPropos(($faker->text()))
            ->setFacebook('facebook');

        $password = $this->encoder->encodePassword($user, 'password');
        $user->setPassword($password);
        $manager->persist(($user));

        //Création de 5 messages de contact

        for ($m = 0; $m < 5; $m++) {
            $contact = new Contact();

            $contact->setNom($faker->word())
                ->setEmail($faker->email)
                ->setObjet($faker->word())
                ->setMessage($faker->word())
                ->setCreatedAt($faker->dateTimeBetween('-6 month', 'now'));

            $manager->persist($contact);
        }

        //Création de 5 Catégories
        for ($k = 0; $k < 5; $k++) {
            $categorie = new Categorie();

            $categorie->setNom($faker->word())
                ->setDescription($faker->words(10, true))
                ->setSlug($faker->slug());

            $manager->persist($categorie);

            //Création de 2 Réalisations par Catégories

            for ($j = 0; $j < 2; $j++) {
                $realisation = new Realisation();

                $realisation->setNom($faker->words(3, true))
                    ->setDateRealisation($faker->dateTimeBetween('-6 month', 'now'))
                    ->setCreatedAt($faker->dateTimeBetween('-6 month', 'now'))
                    ->setDescription($faker->text())
                    ->setPortfolio($faker->randomElement([true, false]))
                    ->setSlug($faker->slug())
                    ->setFile('/img/placeholder.jpg')
                    ->addCategorie($categorie)
                    ->setUser($user);

                $manager->persist($realisation);
            }
        }
        $manager->flush();
    }
}
