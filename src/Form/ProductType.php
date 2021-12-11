<?php

namespace App\Form;

use Doctrine\DBAL\Types\DateTimeType as TypesDateTimeType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('product_name', TextType::class)
        ->add('description', TextType::class)
        ->add('deliverytime', TextType::class)
        ->add('expires_at', DateTimeType::class)
        ->add('starting_price', TextType::class)
        ->add('photoName', FileType::class); 
            
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // uncomment if you want to bind to a class
            //'data_class' => Contact::class,
        ]);
    }
}