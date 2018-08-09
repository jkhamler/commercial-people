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
use App\Entity\LeagueMatch;
use App\Entity\Player;
use App\Entity\Team;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

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
        $manager->persist($premierLeague);

        $worldCup = new League();
        $worldCup->setName('World Cup');
        $worldCup->addTeam($englandTeam);
        $manager->persist($worldCup);

        $faker = Factory::create();
        $teamnames = [
            'UK' => [
                'Ipswich Town',
                'QPR',
                'Manchester City',
                'Wigan',
                'Portsmouth',
            ],
            'France' => [
                'Paris St. Germain',
                'Olympique de Marseille',
                'Olympique Lyonnais',
                'AS Monaco FC',
                'Lille OSC',
            ],
        ];

        foreach ($teamnames as $countryName => $countryTeamNames) {
            foreach ($countryTeamNames as $countryTeamName) {

                $team = new Team();
                $team->setName($countryTeamName);
                $team->setStrip($faker->colorName . ' and ' . $faker->colorName);
                $team->setCountry($countryName == 'UK' ? $uk : $france);

                $manager->persist($team);

                for($playerCount = 0; $playerCount < 15; $playerCount ++){

                    $newPlayer = new Player();
                    $newPlayer->setHeightCm(mt_rand(160, 200));
                    $newPlayer->setAge(mt_rand(19, 35));
                    $newPlayer->setName($faker->name('male'));

                    $manager->persist($newPlayer);

                    $team->addPlayer($newPlayer);

                    if($playerCount % 5 == 0){
                        $countryTeamName == 'UK' ?
                        $englandTeam->addPlayer($newPlayer)
                            : $franceTeam->addPlayer($newPlayer);
                    }

                }
            }

        }

//        $match = new LeagueMatch();
//
//        $premierLeague->addMatch($match);



        // Flush all entities
        $manager->flush();


    }


}