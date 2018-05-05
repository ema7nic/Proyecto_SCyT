<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class SolicitudConceptoType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('concepto', EntityType::class, array(
            'class' => 'AppBundle:Concepto',
            'choice_label' => 'concepto',
            'label' => false,
            'attr' => array('class' => 'form-control'),
        ));
        $builder->add('monto', IntegerType::class, array(
            'attr' => array('class' => 'form-control','placeholder' => '0'),
            'label' => false,
            'empty_data' => '0',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\SolicitudConcepto'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'appbundle_solicitudconcepto';
    }

}
