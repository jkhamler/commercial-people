<?php

namespace App\Controller;

use App\Entity\League;
use App\Repository\LeagueRepository;
use Doctrine\DBAL\Types\Type;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LeagueController extends Controller
{

    /**
     * @Route("/league/{leagueId}/teams", name="league-teams", requirements={"leagueId"="\d+"})
     * @Method({"GET"})
     *
     * @param SerializerInterface $serializer
     * @return Response
     */
    public function listTeams($leagueId, SerializerInterface $serializer){

        /** @var League|null $league */
        $league = $this->getDoctrine()
            ->getRepository(League::class)
            ->find($leagueId);

        if(!$league){
            return new Response("No League with ID {$leagueId} found", Response::HTTP_NOT_FOUND);
        }
        else{
            return new Response(
                $serializer->serialize(['teams' => $league->getTeams()], Type::JSON)
            , Response::HTTP_OK);
        }
    }

    /**
     * @Route("/league/{leagueId}", name="delete-league")
     * @Method({"DELETE"})
     *
     * @param SerializerInterface $serializer
     * @return Response
     */
    public function deleteLeague($leagueId, SerializerInterface $serializer){

        $em = $this->getDoctrine()->getManager();

        /** @var League|null $league */
        $league = $em
            ->getRepository(League::class)
            ->find($leagueId);

        if(!$league){
            return new Response("No League with ID {$leagueId} found", Response::HTTP_NOT_FOUND);
        }else{

            $em->remove($league);
            $em->flush();

            return new Response($serializer->serialize("League with ID {$leagueId} has been deleted",
                Type::JSON), Response::HTTP_OK);
        }

    }





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
