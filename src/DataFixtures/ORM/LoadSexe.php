<?php
// src/OC/PlatformBundle/DataFixtures/ORM/LoadCategory.php

namespace App\DataFixtures\ORM;

use App\Entity\RefSexe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadSexe extends Fixture
{
    // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
    public function load(ObjectManager $manager)
    {
        // Liste des noms de catégorie à ajouter
        $names = array(
            'Homme',
            'Femme',
            'les deux'
        );

        foreach ($names as $name) {
            // On crée la catégorie
            $sexe = new RefSexe();
            $sexe->setSexe($name);

            // On la persiste
            $manager->persist($sexe);
        }

        // On déclenche l'enregistrement de toutes les catégories
        $manager->flush();
    }

    public function getOrder() {
        return 4;
    }
}