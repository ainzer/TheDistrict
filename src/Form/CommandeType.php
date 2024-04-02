<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('adresseLivraison', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('adresseFacturation', TextType::class, ['attr' => ['class' => 'form-control'],])
            ->add('MoyenPaiement', ChoiceType::class, [ 'choices' => [
                'PayPal' => 'Paypal',
                'Visa' => 'Visa',
                'MasterCard' => 'Mastercard'], 'placeholder' => 'Sélectionnez un moyen de paiement', 'attr' => ['class' => 'form-control'],])
            
            ->add('NomCarte', TextType::class, ['attr' => ['class' => 'form-control'],])

            ->add('NumeroCarte', TextType::class, ['attr' => ['class' => 'form-control'],])

            ->add('DateExpiration', TextType::class, ['attr' => ['class' => 'form-control'],])

            ->add('CCV', TextType::class, ['attr' => ['class' => 'form-control'],])

            ->add('RGPDConsent', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter les CGU.',
                    ]),
                ],
                'label'=> 'J\'accepte les Conditions Générales d\'Utilisation.',
            ])

        ;
    }
        
    

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}