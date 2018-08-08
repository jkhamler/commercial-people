<?php

namespace App\Controller;

use App\Entity\Country;
use JMS\Serializer\SerializerBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CountryController extends AbstractController
{
    /**
     * @Route("/countries", name="countries")
     */
    public function list()
    {
        $countries = $this->getDoctrine()
            ->getRepository(Country::class)
            ->findAll();

        $serializer = SerializerBuilder::create()->build();

        return new Response(
            $serializer->serialize(
                ['countries' => $countries],
                'json'),
            Response::HTTP_OK
        );
    }
}
