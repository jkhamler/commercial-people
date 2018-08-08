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
use App\Entity\Player;
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
        $ipswichTown->setCountry($uk);
        $manager->persist($ipswichTown);

        $parisStGermain = new Team();
        $parisStGermain->setName('Paris St. Germain');
        $parisStGermain->setStrip('Blue and Red');
        $parisStGermain->setCountry($france);
        $manager->persist($parisStGermain);

        $englandTeam = new Team();
        $englandTeam->setName('England');
        $englandTeam->setStrip('Red and White');
        $englandTeam->setCountry($uk);
        $manager->persist($englandTeam);

        $franceTeam = new Team();
        $franceTeam->setName('France');
        $franceTeam->setStrip('Black and White');
        $franceTeam->setCountry($uk);
        $manager->persist($franceTeam);


        $premierLeague = new League();
        $premierLeague->setName('Premier League');
        $premierLeague->addTeam($ipswichTown);
        $manager->persist($premierLeague);

        $worldCup = new League();
        $worldCup->setName('World Cup');
        $worldCup->addTeam($englandTeam);
        $manager->persist($worldCup);

        $davidSeaman = new Player();
        $davidSeaman->setName('David Seaman');
        $davidSeaman->setAge(45);
        $davidSeaman->setHeightCm(185);
        $manager->persist($davidSeaman);

        $neymar = new Player();
        $neymar->setName('Neymar');
        $neymar->setAge(26);
        $neymar->setHeightCm(180);
        $manager->persist($neymar);

        for($playerCount = 0; $playerCount < 15; $playerCount ++){
            // add players to teams
        }

        $ipswichTown->addPlayer($davidSeaman);
        $englandTeam->addPlayer($davidSeaman);

        $parisStGermain->addPlayer($neymar);
        $franceTeam->addPlayer($neymar);


        // Flush all entities
        $manager->flush();


    }

}