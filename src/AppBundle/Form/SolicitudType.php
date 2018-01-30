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
        $builder->add('fechaGeneracion')->add('fechaUltimaModificacion')->add('direccion')->add('fechaInicio')->add('fechaFin')->add('nombreEvento')->add('fechaSalida')->add('fechaLlegada')->add('importeTotal')->add('estado')->add('autores')->add('ejercicio')->add('observaciones')->add('nroNota')->add('fechaRevision')->add('usuario')->add('localidad')->add('proyectoGrupo');
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
