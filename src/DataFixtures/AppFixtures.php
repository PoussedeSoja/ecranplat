<?php

namespace App\DataFixtures;

use App\Entity\Articles;
use App\Entity\Commentaires;
use App\Entity\Users;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
      {
        $faker = Faker\Factory::create('fr_FR');
        // on crée 4 auteurs avec noms et prénoms "aléatoires" en français
        $articles = Array();
        for ($i = 0; $i < 4; $i++) {
            $articles[$i] = new Articles();
            $articles[$i]->setTitre($faker->text);
            $articles[$i]->setResume($faker->text);
            $articles[$i]->setCategorie($faker->text);
            $articles[$i]->setSouscategorie($faker->text);
            $articles[$i]->setAuteur($faker->firstName);
            $articles[$i]->setContenu($faker->text);
            $articles[$i]->setImage($faker->text);

            $manager->persist($articles[$i]);
        }
    // nouvelle boucle pour créer des livres

    $commentaires = Array();

    for ($i = 0; $i < 12; $i++) {
            $commentaires[$i] = new Commentaires();
            $commentaires[$i]->setContenu($faker->text);
            $commentaires[$i]->setAuteur($faker->firstname);
            

            $manager->persist($commentaires[$i]);
        }

   // nouvelle boucle pour créer des livres

   $users = Array();

   for ($i = 0; $i < 12; $i++) {
           $users[$i] = new Users();
           $users[$i]->setEmail($faker->email);
           $users[$i]->setPassword($faker->password);
           

           $manager->persist($users[$i]);
       }

        $manager->flush();
    }
}