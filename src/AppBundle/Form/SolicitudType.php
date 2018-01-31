<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SolicitudType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('direccion')
        ->add('localidad')
        ->add('fechaInicio')
        ->add('fechaFin')
        ->add('nombreEvento')
        ->add('proyectoGrupo')
        ->add('autores')
        ->add('contratados')
        ->add('fechaSalida')
        ->add('fechaLlegada')
        ->add('importeTotal')
        ->add('observaciones');

      
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
