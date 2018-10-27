<?php

namespace App\DataFixtures\ORM;

use App\Entity\RefHobbies;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadHobbies extends Fixture
{
    // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
    public function load(ObjectManager $manager)
    {
        // Liste des noms de catégorie à ajouter
        $names = array(
            'Exposition / Musée',
            'Concert',
            'Jeux vidéo',
            'Sport',
            'Science'
        );

        foreach ($names as $name) {
            // On crée la catégorie
            $hobbies = new RefHobbies();
            $hobbies->setPreferences($name);

            // On la persiste
            $manager->persist($hobbies);
        }

        // On déclenche l'enregistrement de toutes les catégories
        $manager->flush();
    }

    public function getOrder() {
        return 3;
    }
}