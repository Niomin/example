<?php

namespace AnimalBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnimalForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('tailLength', NumberType::class)
            ->add('species', EntityType::class, [
                'class'        => 'AnimalBundle:Species',
                'choice_label' => 'title',
            ])
            ->add('color', EntityType::class, [
                'class'        => 'AnimalBundle:Color',
                'choice_label' => 'title',
            ])
            ->add('Продолжить', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AnimalBundle\Entity\Animal',
        ]);
    }
}