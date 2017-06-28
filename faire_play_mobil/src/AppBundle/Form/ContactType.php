<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 26/06/2017
 * Time: 14:34
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Nom'])
            ->add('email', TextType::class, ['label' => 'Email'])
            ->add('sujet', ChoiceType::class, array(
                    'choices'  => array(
                        'Information sur l\'association' => 'information_association',
                        'Information sur les projets' => 'information_projet',
                        'Problème sur le site' => 'probleme_site',
                    ), 'label' => 'Sujet'
                )
            )
            ->add('message', TextareaType::class, ['label' => 'Message'])
            ->add('cgu', CheckboxType::class, ['label' => 'CGU'])
            ->add('envoyer', SubmitType::class, ['label' => 'Envoyer'])
        ;
    }
}