<?php

namespace App\DataFixtures;

use App\Entity\Stagiaire;
use Doctrine\Bundle\FixturesBundle\Fixture;

use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class StagiaireFixture extends Fixture
{
    public function load(ObjectManager $manager)
    { 
        $faker = Factory::create('fr_FR');
        for ($i=0;$i<50;$i++){
        $stagiaire=new Stagiaire();
        $stagiaire
            ->setName($faker->firstName('male'|'female'))
            ->setFirstname($faker->lastName)
            ->setBirthday($faker->dateTimeThisCentury($max = 'now'))
            ->setMail($faker->safeEmail)
            ->setPhone($faker->phoneNumber);
        $manager->persist($stagiaire);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
