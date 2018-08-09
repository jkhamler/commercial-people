<?php

namespace App\Controller;

use App\DTO\TeamDTO;
use App\Entity\Team;
use App\Form\CreateTeam;
use App\Form\UpdateTeam;
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

            $formErrors = $form->getErrors();

            return new Response("Validation Errors: {$formErrors}",
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
        $data = $request->request->all();

        $team = new Team();

        $form = $this->createForm(UpdateTeam::class, $team);

        $form->submit($data);

        if (!$form->isValid()) {

            $formErrors = $form->getErrors();

            return new Response("Validation Errors: {$formErrors}",
                Response::HTTP_UNAUTHORIZED);
        } else {


            $em = $this->getDoctrine()->getManager();

            $em->persist($team);

            $em->flush();

            return new Response($serializer->serialize([
                'team' => $team
            ], Type::JSON),
                Response::HTTP_CREATED);
        }
    }

    }
