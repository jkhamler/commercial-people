<?php
/**
 * Created by PhpStorm.
 * User: jonathanhamler
 * Date: 08/08/2018
 * Time: 14:20
 */

namespace App\DataFixtures;


use App\Entity\Country;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

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





// Flush all entities
        $manager->flush();


    }

}