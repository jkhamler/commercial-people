<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class TokenController extends AbstractController
{

    /**
     * @Route("/register", name="register")
     * @Method({"POST"})
     *
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @return Response
     */
    public function register(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $em = $this->getDoctrine()->getManager();

        $username = $request->request->get('_username');
        $password = $request->request->get('_password');

        $user = new User($username);

        $user->setPassword($encoder->encodePassword($user, $password));
        $em->persist($user);

        $em->flush();

        return new Response(sprintf('User %s successfully created', $user->getUsername()));
    }


    /**
     * @Route("/api", name="api")
     *
     * @return Response
     */

    public function api()
    {
        return new Response(sprintf('Logged in as %s', $this->getUser()->getUsername()));
    }


}
