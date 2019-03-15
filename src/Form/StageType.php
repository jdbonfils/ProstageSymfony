<?php

namespace App\Form;


use App\Entity\Stage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
//use App/Form/FormationType;

class StageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('description')
            ->add('contact')
            ->add('Entreprise',EntrepriseType::class)
            //->add('formations' EntityType::class , ['entry_type' => FormationType::class , 'entry_options'=> ['label'=>false ], 'allow_add' => true , 'allow_delete' => true, ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Stage::class,
        ]);
    }
}
