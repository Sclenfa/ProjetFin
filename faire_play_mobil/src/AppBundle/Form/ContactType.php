<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 26/06/2017
 * Time: 14:34
 */

namespace AppBundle\Form;


use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('email')
            ->add('sujet', ChoiceType::class, array(
                    'choices'  => array(
                        'Information sur l\'association' => 'information_association',
                        'Information sur les projets' => 'information_projet',
                        'Performance' => 'performance',
                        'Ateliers' => 'ateliers',
                    )
                )
            )
            ->add('votre_message')
            ->add('envoyer', SubmitType::class)
        ;
    }
}