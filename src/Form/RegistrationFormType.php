<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control form-control-user',
                    'placeholder' => 'Email'
                ],
                'label' => false
            ])
            ->add('lastname', TextType::class, [
                'attr' => [
                    'class' => 'form-control form-control-user',
                    'placeholder' => 'Lastname'
                ],
                'label' => false
            ])
            ->add('firstname', TextType::class, [
                'attr' => [
                    'class' => 'form-control form-control-user',
                    'placeholder' => 'Firstname'
                ],
                'label' => false
            ])
            ->add('address', TextType::class, [
                'attr' => [
                    'class' => 'form-control form-control-user',
                    'placeholder' => 'Address'
                ],
                'label' => false
            ])
            ->add('zipcode', TextType::class, [
                'attr' => [
                    'class' => 'form-control form-control-user',
                    'placeholder' => 'Zipcode'
                ],
                'label' => false
            ])
            ->add('city', TextType::class, [
                'attr' => [
                    'class' => 'form-control form-control-user',
                    'placeholder' => 'City'
                ],
                'label' => false
            ])
            ->add('country', TextType::class, [
                'attr' => [
                    'class' => 'form-control form-control-user',
                    'placeholder' => 'Country'
                ],
                'label' => false
            ])
            ->add('RgpdConsent', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to the new RGPD.',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => [
                    'autocomplete' => 'new-password',
                    'class' => 'form-control form-control-user',
                    'placeholder' => 'Password'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
                'label' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
