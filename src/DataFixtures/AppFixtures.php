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
        $englandTeam->setClubAddress('Olympic Stadium, London');
        $manager->persist($englandTeam);

        $franceTeam = new Team();
        $franceTeam->setName('France');
        $franceTeam->setStrip('Black and White');
        $franceTeam->setCountry($uk);
        $franceTeam->setClubAddress('Paris Sports Arena');
        $manager->persist($franceTeam);

        $premierLeague = new League();
        $premierLeague->setName('Premier League');
        $manager->persist($premierLeague);

        $worldCup = new League();
        $worldCup->setName('World Cup');
        $worldCup->addTeam($englandTeam);
        $worldCup->addTeam($franceTeam);
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
                $team->setClubAddress($faker->address);

                $manager->persist($team);

                if($countryName == 'UK'){
                    $premierLeague->addTeam($team);
                }

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

        $premierLeagueTeams = $premierLeague->getTeams();

        foreach ($premierLeagueTeams as $homeTeam) {
            foreach ($premierLeagueTeams as $awayTeam) {
                if($homeTeam->getName() !== $awayTeam->getName()){

                    $leagueMatch = new LeagueMatch();
                    $leagueMatch->setLeague($premierLeague);
                    $leagueMatch->setDate($faker->dateTimeBetween('-1 year'));
                    $leagueMatch->setHomeTeam($homeTeam);
                    $leagueMatch->setAwayTeam($awayTeam);

                    $leagueMatch->setHomeTeamGoalsScored(mt_rand(0,8));
                    $leagueMatch->setHomeTeamYellowCards(mt_rand(0,4));
                    $leagueMatch->setHomeTeamRedCards(mt_rand(0,2));

                    $leagueMatch->setAwayTeamGoalsScored(mt_rand(0,8));
                    $leagueMatch->setAwayTeamYellowCards(mt_rand(0,4));
                    $leagueMatch->setAwayTeamRedCards(mt_rand(0,2));

                    $premierLeague->addMatch($leagueMatch);

                }
            }
        }


        // Flush all entities
        $manager->flush();


    }


}