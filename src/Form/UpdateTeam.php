<?php
/**
 * Created by PhpStorm.
 * User: jonathanhamler
 * Date: 09/08/2018
 * Time: 14:55
 */

namespace App\Form;

use App\DTO\TeamDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UpdateTeam extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
            ->add('strip')
            ->add('clubAddress');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' =>
                TeamDTO::class
        ]);
    }

}