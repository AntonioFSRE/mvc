<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\CallbackTransformer;

class EditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('product_name', TextType::class, array('attr' => array('class' => 'form-control')))
        ->add('description', TextType::class, array(
          'attr' => array('class' => 'form-control')
        ))
        ->add('deliverytime', TextType::class, array(
          'attr' => array('class' => 'form-control')
        ))
        ->add('expires_at', DateTimeType::class,[
          'label' => 'Expires at',
          ])
        ->add('photoName', FileType::class, [
          'label' => 'Photo',
          'mapped' => false,
          'required' => false,
         ])
        ->add('starting_price', NumberType::class,[
            'label' => 'Starting price',
        ])
        ->add('currency', EntityType::class, array(    
              'class' => 'App:Currency',
             'choice_label' => 'currency',
        ))  
        ->add('save', SubmitType::class, array(
          'label' => 'Update',
          'attr' => array('class' => 'btn btn-primary mt-3')
        ));
        $builder
    ->get(
        'starting_price',
        NumberType::class,
        [
            'label' => 'Starting price',
        ]
    )
    ->addModelTransformer(new CallbackTransformer(
        function ($data) {
            return $data / 100;
        },
        function ($data) {
            return $data * 100;
        }
   )
);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // uncomment if you want to bind to a class
            //'data_class' => Contact::class,
        ]);
    }
}