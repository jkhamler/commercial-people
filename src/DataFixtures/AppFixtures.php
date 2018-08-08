<?php
/**
 * Created by PhpStorm.
 * User: jonathanhamler
 * Date: 08/08/2018
 * Time: 14:20
 */

namespace App\DataFixtures;


use App\Entity\Country;
use App\Entity\League;
use App\Entity\Team;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{

    /**
     * Load Application Fixtures (Fake Data)
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $uk = new Country();
        $uk->setName('UK');
        $uk->setLanguage('English');

        $manager->persist($uk);

        $france = new Country();
        $france->setName('France');
        $france->setLanguage('French');

        $manager->persist($france);

        $ipswichTown = new Team();
        $ipswichTown->setName('Ipswich Town');
        $ipswichTown->setStrip('Blue and White');
        $manager->persist($ipswichTown);


        $premierLeague = new League();
        $premierLeague->setName('Premier League');
        $premierLeague->addTeam($ipswichTown);
        $manager->persist($premierLeague);

        // Flush all entities
        $manager->flush();


    }

}