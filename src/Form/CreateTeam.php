<?php
/**
 * Created by PhpStorm.
 * User: jonathanhamler
 * Date: 09/08/2018
 * Time: 14:55
 */

namespace App\Form;

use App\Entity\Team;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateTeam extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
            ->add('strip')
            ->add('clubAddress');
    }

//    public function configureOptions(OptionsResolver $resolver)
//    {
//        $resolver->setDefaults([
//            'data_class' =>
//                Team::class
//        ]);
//    }

}