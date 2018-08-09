<?php
/**
 * Created by PhpStorm.
 * User: jonathanhamler
 * Date: 08/08/2018
 * Time: 14:20
 */

namespace App\DataFixtures;


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
        $faker = Factory::create();

        $premierLeague = new League();
        $premierLeague->setName('Premier League');
        $manager->persist($premierLeague);

        $worldCup = new League();
        $worldCup->setName('World Cup');
        $manager->persist($worldCup);

        // Premier League Teams

        $premierLeagueTeamNames = [
            'Ipswich Town',
            'QPR',
            'Manchester City',
            'Wigan',
            'Portsmouth',
        ];

        foreach ($premierLeagueTeamNames as $premierLeagueTeamName) {

            $premierLeagueTeam = new Team();
            $premierLeagueTeam->setName($premierLeagueTeamName);
            $premierLeagueTeam->setStrip($faker->colorName . ' and ' . $faker->colorName);
            $premierLeagueTeam->setClubAddress($faker->address);

            $manager->persist($premierLeagueTeam);
            $premierLeague->addTeam($premierLeagueTeam);

            for ($playerCount = 0; $playerCount < 15; $playerCount++) {

                $newPlayer = new Player();
                $newPlayer->setHeightCm(mt_rand(160, 200));
                $newPlayer->setAge(mt_rand(19, 35));
                $newPlayer->setName($faker->name('male'));

                $manager->persist($newPlayer);

                $premierLeagueTeam->addPlayer($newPlayer);
            }
        }

        // PLAY THE PREMIER LEAGUE

        $premierLeagueTeams = $premierLeague->getTeams();

        foreach ($premierLeagueTeams as $homeTeam) {
            foreach ($premierLeagueTeams as $awayTeam) {
                if ($homeTeam->getName() !== $awayTeam->getName()) {

                    $leagueMatch = new LeagueMatch();
                    $leagueMatch->setLeague($premierLeague);
                    $leagueMatch->setDate($faker->dateTimeBetween('-1 year'));
                    $leagueMatch->setHomeTeam($homeTeam);
                    $leagueMatch->setAwayTeam($awayTeam);

                    $leagueMatch->setHomeTeamGoalsScored(mt_rand(0, 8));
                    $leagueMatch->setHomeTeamYellowCards(mt_rand(0, 4));
                    $leagueMatch->setHomeTeamRedCards(mt_rand(0, 2));

                    $leagueMatch->setAwayTeamGoalsScored(mt_rand(0, 8));
                    $leagueMatch->setAwayTeamYellowCards(mt_rand(0, 4));
                    $leagueMatch->setAwayTeamRedCards(mt_rand(0, 2));

                    $premierLeague->addMatch($leagueMatch);

                }
            }
        }

        for ($worldCupTeamCount = 0; $worldCupTeamCount < 15; $worldCupTeamCount++) {

            $worldCupTeam = new Team();
            $worldCupTeam->setName($faker->country);
            $worldCupTeam->setStrip($faker->colorName . ' and ' . $faker->colorName);
            $worldCupTeam->setClubAddress($faker->address);

            $manager->persist($worldCupTeam);

            $worldCup->addTeam($worldCupTeam);

        }

        // PLAY THE WORLD CUP

        $worldCupTeams = $worldCup->getTeams();

        foreach ($worldCupTeams as $homeTeam) {
            foreach ($worldCupTeams as $awayTeam) {
                if ($homeTeam->getName() !== $awayTeam->getName()) {

                    $leagueMatch = new LeagueMatch();
                    $leagueMatch->setLeague($worldCup);
                    $leagueMatch->setDate($faker->dateTimeBetween('-1 year'));
                    $leagueMatch->setHomeTeam($homeTeam);
                    $leagueMatch->setAwayTeam($awayTeam);

                    $leagueMatch->setHomeTeamGoalsScored(mt_rand(0, 8));
                    $leagueMatch->setHomeTeamYellowCards(mt_rand(0, 4));
                    $leagueMatch->setHomeTeamRedCards(mt_rand(0, 2));

                    $leagueMatch->setAwayTeamGoalsScored(mt_rand(0, 8));
                    $leagueMatch->setAwayTeamYellowCards(mt_rand(0, 4));
                    $leagueMatch->setAwayTeamRedCards(mt_rand(0, 2));

                    $worldCup->addMatch($leagueMatch);

                }
            }
        }

        // Flush all entities
        $manager->flush();


    }


}