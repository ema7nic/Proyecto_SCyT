<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Doctrine\DBAL\Types\FloatType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class SolicitudType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('direccion',TextType::class, array("required" => "required"))
        ->add('localidad')
        ->add('fechaInicio',DateType::class, array("required" => "required"))
        ->add('fechaFin',DateType::class, array("required" => "required"))
        ->add('nombreEvento',TextType::class, array("required" => "required"))
        ->add('proyectoGrupo')
        ->add('autores',TextType::class, array("required" => "required"))
        ->add('contratados',TextType::class, array("required" => "required"))
        ->add('fechaSalida',DateType::class, array("required" => "required"))
        ->add('fechaLlegada',DateType::class, array("required" => "required"))
        ->add('importeTotal',IntegerType::class, array("required" => "required"))
        ->add('observaciones',TextType::class);

      
    }/**
    
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Solicitud'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_solicitud';
    }


}
