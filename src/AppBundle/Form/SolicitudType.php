<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use AppBundle\Form\SolicitudConceptoType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class SolicitudType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('direccion', TextType::class, array('required' => true))
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
                ->add('nombreEvento', TextType::class, array('required' => true))
                ->add('proyectoGrupo', EntityType::class, array(
                    'class' => 'AppBundle:ProyectoGrupo',
                    'choice_label' => 'nombre'
                ))
                ->add('autores', TextType::class, array('required' => true))
                ->add('contratados', TextType::class, array('required' => true))
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
                ->add('nroNota', NumberType::class, array('required' => false))
                ->add('importeTotal', NumberType::class, array(
                    'required' => true,
                    'empty_data' => '0',
                    'attr' => array('placeholder' => '0'),
                ))
                ->add('observaciones', TextareaType::class, array('required' => false));

        $builder->add('conceptos', CollectionType::class, array(
            'entry_type' => SolicitudConceptoType::class,
            'prototype' => true,
            'allow_add' => true,
            'allow_delete' => true,
            'by_reference' => false,
            'label' => false,
            'entry_options' => array(
                'label' => false,
            ),
        ));
    }

    /**

     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Solicitud'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'appbundle_solicitud';
    }

}
