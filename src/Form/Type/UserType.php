<?php


namespace App\Form\Type;


use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'label'         => 'Nom d\'utilisateur :',
                'label_attr'    => [
                    'class'         => 'text-white',
                ],
                'attr'          => [
                    'placeholder'   => 'Nom d\'utilisateur',
                    'class'         => 'form-control'
                ],
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Mot de passe :',
                'label_attr'    => [
                    'class'         => 'text-white mt-4',
                ],
                'attr'  => [
                    'placeholder'   => 'Mot de passe',
                    'class'         => 'form-control'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => User::class]);
    }
}