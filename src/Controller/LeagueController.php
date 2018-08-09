<?php

namespace App\Controller;

use App\Entity\League;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LeagueController extends Controller
{
    /**
     * @Route("/league-stats", name="league-stats")
     *
     * @param SerializerInterface $serializer
     * @return Response
     */
    public function leagueStats(SerializerInterface $serializer)
    {
        /** @var League $premierLeague */
        $premierLeague = $this->getDoctrine()
            ->getRepository(League::class)
            ->findOneBy([
                'name' => 'World Cup'
            ]);

        $leagueStats = [];

        foreach ($premierLeague->getLeagueTeams() as $leagueTeam) {

            $leagueStats[] = [
                'Team' => $leagueTeam->getTeam()->getName(),
                'Goals Scored' => $leagueTeam->getGoalsScored(),
                'Goals Conceded' => $leagueTeam->getGoalsConceded(),
                'Yellow Cards' => $leagueTeam->getYellowCardsReceived(),
                'Red Cards' => $leagueTeam->getRedCardsReceived(),
                'League Points' => $leagueTeam->getLeaguePoints(),
            ];

        }

        return new Response(
            $serializer->serialize(
                ['leagueStats' => $leagueStats],
                'json'),
            Response::HTTP_OK
        );
    }
}
