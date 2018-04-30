<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class SolicitudType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('direccion',TextType::class, array('required' => true))
        ->add('localidad', EntityType::class, array(
            'class' => 'AppBundle:Localidad',
            'choice_label' => 'nombre'
        ))
        //->add('fechaInicio',DateType::class, array("required" => "required"))
        ->add('fechaInicio', DateType::class, array(
            'required' => true,
            'widget' => 'single_text',
            'attr' => [
                'class' => 'form-control input-inline datetimepicker',
                'data-provide' => 'datetimepicker',
                'html5' => false,
            ],
            ))
        //->add('fechaFin',DateType::class, array("required" => "required"))
        ->add('fechaFin', DateType::class, array(
            'required' => true,
            'widget' => 'single_text',
            'attr' => [
                'class' => 'form-control input-inline datetimepicker',
                'data-provide' => 'datetimepicker',
                'html5' => false,
            ],
            ))
        ->add('nombreEvento',TextType::class, array('required' => true))
        ->add('proyectoGrupo', EntityType::class, array(
            'class' => 'AppBundle:ProyectoGrupo',
            'choice_label' => 'nombre'
        ))
        ->add('autores',TextType::class, array('required' => true))
        ->add('contratados',TextType::class, array('required' => true))
        //->add('fechaSalida',DateType::class, array("required" => "required"))
        ->add('fechaSalida', DateType::class, array(
            'required' => true,
            'widget' => 'single_text',
            'attr' => [
                'class' => 'form-control input-inline datetimepicker',
                'data-provide' => 'datetimepicker',
                'html5' => false,
            ],
            ))
        //->add('fechaLlegada',DateType::class, array("required" => "required"))
        ->add('fechaLlegada', DateType::class, array(
            'required' => true,
            'widget' => 'single_text',
            'attr' => [
                'class' => 'form-control input-inline datetimepicker',
                'data-provide' => 'datetimepicker',
                'html5' => false,
            ],
            ))
            ->add('tipoevento', EntityType::class, array(
                'class' => 'AppBundle:TipoEvento',
                'choice_label' => 'nombre'
            ))
            ->add('nroNota',NumberType::class, array('required' => false))
        ->add('importeTotal',NumberType::class, array('required' => true))
        ->add('observaciones',TextType::class, array('required' => false));

      
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
