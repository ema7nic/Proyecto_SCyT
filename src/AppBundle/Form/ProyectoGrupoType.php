<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProyectoGrupoType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('codigo')
                ->add('codigoUtn')
                ->add('nombre')
                ->add('fechaInicio')
                ->add('fechaFin')
                ->add('nombre')
                ->add('saldo');

        $builder->add('usuario', EntityType::class, array(
            'class' => 'AppBundle:Usuario',
            'choice_label' => 'nombre',
        ));
    }

/**
     * {@inheritdoc}
     */

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ProyectoGrupo'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'appbundle_proyectogrupo';
    }

}
