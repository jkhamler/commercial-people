<?php

namespace App\Controller;

use App\DTO\TeamDTO;
use App\Entity\Team;
use App\Form\CreateTeam;
use App\Form\UpdateTeam;
use App\Repository\TeamRepository;
use Doctrine\DBAL\Types\Type;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class TeamController extends Controller
{

    /**
     * Creates a new team via a POST request.
     *
     * @Route("/team", name="create-team")
     * @Method({"POST"})
     *
     * @param Request $request
     * @param SerializerInterface $serializer
     * @return Response
     */
    public function createTeam(Request $request, SerializerInterface $serializer){

        $teamDTO = new TeamDTO();

        $form = $this->createForm(CreateTeam::class, $teamDTO, [
            'allow_extra_fields' => false,
        ]);

        $data = $request->request->all();

        $form->submit($data);

        if (!$form->isValid()) {

            return new Response($serializer->serialize(['Errors' => $form->getErrors()],
                Type::JSON),
                Response::HTTP_UNAUTHORIZED);

        } else {

            /** @var TeamDTO $teamDTO */
            $teamDTO = $form->getData();

            $em = $this->getDoctrine()->getManager();

            if($em->getRepository(Team::class)->findOneBy([
                'name' => $teamDTO->getName()
            ])){
                return new Response("Team name {$teamDTO->getName()} has already been taken.",
                    Response::HTTP_UNAUTHORIZED); // todo - move this into form validation.
            }

            $team = $teamDTO->createTeamEntity();

            $em->persist($team);

            $em->flush();

            return new Response($serializer->serialize([
                'team' => $team
            ], Type::JSON),
                Response::HTTP_CREATED);
        }
    }

    /**
     * Updates the Team information Via a PUT request.
     *
     * @Route("/team/{teamId}", name="update-team", requirements={"leagueId"="\d+"})
     * @Method({"PUT"})
     *
     * @param int $teamId
     * @param Request $request
     * @param SerializerInterface $serializer
     * @return Response
     */
    public function updateTeam($teamId, Request $request, SerializerInterface $serializer)
    {
        $teamDTO = new TeamDTO();

        $form = $this->createForm(UpdateTeam::class, $teamDTO, [
            'allow_extra_fields' => false,
        ]);

        $data = $request->request->all();

        $form->submit($data);

        if (!$form->isValid()) {

            return new Response($serializer->serialize(['Errors' => $form->getErrors()],
                Type::JSON),
                Response::HTTP_UNAUTHORIZED);
        } else {

            $teamDTO = $form->getData();

            $em = $this->getDoctrine()->getManager();

            /** @var TeamRepository $rpTeam */
            $rpTeam = $em->getRepository(Team::class);

            $team = $rpTeam->find($teamId);

            $teamDTO->updateTeam($team);

            $em->persist($team);

            $em->flush();

            return new Response($serializer->serialize([
                'team' => $team
            ], Type::JSON),
                Response::HTTP_CREATED);
        }
    }

    }
