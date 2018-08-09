<?php

namespace App\Controller;

use App\Entity\Team;
use App\Form\CreateTeam;
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
     * @Route("/team/create", name="create-team")
     * @Method({"POST"})
     *
     * @param Request $request
     * @param SerializerInterface $serializer
     * @return Response
     */
    public function createTeam(Request $request, SerializerInterface $serializer){

        $data = $request->request->all();

        $team = new Team();

        $form = $this->createForm(CreateTeam::class, $team);

        $form->submit($data);

        if (!$form->isValid()) {
            return new Response("Validation Errors: {$form->getErrors()}",
                Response::HTTP_UNAUTHORIZED);
        } else {

            /** @var Team $team */
            $team = $form->getData();

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
