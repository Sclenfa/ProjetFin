<?php

namespace AppBundle\Form;

use AppBundle\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Nom'])
            ->add('email', TextType::class, ['label' => 'Email'])
            ->add('description', TextType::class, ['label' => 'Description'])
            ->add('address', TextType::class, ['label' => 'Adresse'])
            ->add('cp', TextType::class, ['label' => 'Code Postal'])
            ->add('date_begin',  DateType::class, array('widget' => 'single_text', 'label' => 'Date de début'))
            ->add('date_end',  DateType::class, array('widget' => 'single_text', 'label' => 'Date de fin'))
            ->add('category', ChoiceType::class, array(
                    'choices'  => array(
                        'Arts Plastiques' => 'arts_plastiques',
                        'Photographie' => 'photographie',
                        'Performance' => 'performance',
                        'Ateliers' => 'ateliers',
                    ), 'label' => 'Categories'
                )
            )
            ->add('city', TextType::class, ['label' => 'Ville'])

            ->add('photo', FileType::class, ['required' => false, 'label' => 'Photo'])
            ->add('participant',TextType::class, ['label' => 'Participants'])
            ->add('statut', ChoiceType::class, array(
                    'choices'  => array(
                        'En Cours' => 'en_cours',
                        'Terminer' => 'terminer',
                    ), 'label' => 'Statut'
                )
            )
            ->add('envoyer', SubmitType::class, ['label' => 'Envoyer'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Project::class,
        ));
    }

}