<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pseudo', TextType::class)
            ->add('roles', Choicetype::class,[
                'label'=>'rôles',
                'multiple'=> true,
                'expanded'=> true,
                'required'=> false,
                'choices'=>[
                    'Ecrivain'=>'ROLE_ECRIVAIN',
                    'Modérateur'=>'ROLE_MODO',
                    'Administrateur'=>'ROLE_ADMIN',
                ]
            ])
            ->add('password', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
