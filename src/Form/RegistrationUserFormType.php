<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;

class RegistrationUserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class,
             array(
                 'label' => 'Nom*',
                 'required' => true,
                 'attr' => ['class' => 'libelle-username']
             ))
            ->add('email', EmailType::class,
            array(
                'label' => 'Email *',
                'required' => true,
                'attr' => ['class' => 'libelle-email']
            ))
            ->add('password', PasswordType::class, array(
                   'label' => 'Mot de passe *',
                   'required' => true,
                   'attr' => ['class' => 'libelle-password']
            ))
            ->add('passwordR', PasswordType::class, array(
                'label' => 'Confirmer votre mot de passe *',
                'required' => true,
                'attr' => ['class' => 'libelle-passwordR']
         ))
            ->add('Valider', SubmitType::class, array('attr' => array('class'=>'btn-success bouton-valider')))
            ->add('Annuler', ResetType::class, array('attr' => array('class'=>'btn-warning bouton-annuler')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
