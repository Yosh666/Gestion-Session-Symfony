<?php

namespace App\Form;

use App\Entity\Programme;
use App\Entity\Session;
use App\Entity\Stagiaire;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SessionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('started_at')
            ->add('ended_at')
            ->add('nb_seat')
            ->add('stagiaires',EntityType::class,[
                'class'=>Stagiaire::class,
                'choice_label'=>function(Stagiaire $stagiaire){
                    return $stagiaire->getName().' '.$stagiaire->getFirstname();
                },
                'multiple'=>true,
                "required"=>false
            ])
            //FIXME
            /*->add('programmes',EntityType::class,[
                'class'=>Programme::class,
                'choice_label'=>function(Programme $programme){
                    return $programme->getBlocmodulesName();
                },
                'multiple'=>true,
                "required"=>false
            ])*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Session::class,
        ]);
    }
}
