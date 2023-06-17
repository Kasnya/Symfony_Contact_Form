<?php

namespace App\Form\Type;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options):void
{
    $builder
        ->add(child: 'Name',type: TextType::class, options: array(
            'required' => false,
            'attr' => array(
                'placeholder' => 'Írd be a neved'
            )
        ))
        ->add(child: 'Email',type: TextType::class, options: array(
            'required' => false,
            'attr' => array(
                'placeholder' => 'Írd be az e-mail címed'
            )
        ))
        ->add(child: 'Message',type: TextareaType::class, options: array(
            'required' => false,
            'attr' => array(
                'placeholder' => 'Írd le mit szeretnél'
            )
        ))
        ->add(child: 'Save',type: SubmitType::class)
        ;
}

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}