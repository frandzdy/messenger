<?php

namespace App\DataFixtures\ORM;

use App\Entity\RefDepartement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadDepartement extends Fixture
{
    // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
    public function load(ObjectManager $manager)
    {
        // Liste des noms de catégorie à ajouter
        $names = array(
            75,
            95,
        );

        $nameDepartement = array(
            'Paris',
            'Val d\'oise',
        );
        foreach ($names as $key => $name) {
            // On crée la catégorie
            $departement = new RefDepartement();
            $departement->setDepartement($name);
            $departement->setNomDepartement($nameDepartement[$key]);

            // On la persiste
            $manager->persist($departement);
        }

        // On déclenche l'enregistrement de toutes les catégories
        $manager->flush();
    }

    public function getOrder() {
        return 2;
    }
}