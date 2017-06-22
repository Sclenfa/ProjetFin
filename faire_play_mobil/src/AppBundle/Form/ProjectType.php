<?php

namespace AppBundle\Form;

use AppBundle\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('address')
            ->add('cp')
            ->add('date_begin',  DateType::class, array('widget' => 'single_text'))
            ->add('date_end',  DateType::class, array('widget' => 'single_text'))
            ->add('category', ChoiceType::class, array(
                    'choices'  => array(
                        'Arts Plastiques' => 'arts_plastiques',
                        'Photographie' => 'photographie',
                        'Performance' => 'performance',
                        'Ateliers' => 'ateliers',
                    )
                )
            )
            ->add('city')
            ->add('photo', FileType::class, ['required' => false])
            ->add('participant')
            ->add('statut', ChoiceType::class, array(
                    'choices'  => array(
                        'En Cours' => 'en_cours',
                        'Terminer' => 'terminer',
                    )
                )
            )
            ->add('envoyer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Project::class,
        ));
    }

}