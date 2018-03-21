<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UsuarioType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('roles')->add('apellido')->add('nombre')->add('telefono')->add('mail')->add('tipoDni')->add('dni');
        $builder->add('tipoDni', ChoiceType::class, array(
            'choices' => array('DNI' => 'DNI', 'LC' => 'LC', 'LE' => 'LE'),
            'choices_as_values' => true,
        ));
        $builder->add('roles', ChoiceType::class, array(
            'required' => true,
            'label' => 'Roles',
            'choices' => array('Administrador' => 'ROLE_ADMINISTRADOR',
                'Coordinador' => 'ROLE_COORDINADOR',
                'Investigador' => 'ROLE_INVESTIGADOR',
            ),
            'multiple' => true,
            'expanded' => true,
            'constraints' => array(
                new NotBlank(array(
                    'message' => 'Este valor no debería estar vacío.',
                        )),
            )
        ));
    }

/**
     * {@inheritdoc}
     */

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Usuario'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'appbundle_usuario';
    }

}
