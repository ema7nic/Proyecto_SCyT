<?php

// ItemFilterType.php

namespace AppBundle\Form;

use Lexik\Bundle\FormFilterBundle\Filter\Query\QueryInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type as Filters;
use Symfony\Component\Form\Extension\Core\Type as Submit;

class ProyectoGrupoFilterType extends AbstractType implements Filters\EmbeddedFilterTypeInterface {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('codigo', Filters\TextFilterType::class, array(
            'apply_filter' => function(QueryInterface $filterQuery, $field, $values) {
                if (!empty($values['value'])) {
                    $qb = $filterQuery->getQueryBuilder();
                    $qb->andWhere($filterQuery->getExpr()->like($field, ':codigo'));
                    $qb->setParameter('codigo', '%' . $values['value'] . '%');
                }
            }
        ));

        $builder->add('filter', Submit\SubmitType::class, array(
            'label' => 'Filtrar'
        ));

        $builder->add('reset', Submit\SubmitType::class, array(
            'label' => 'Reiniciar'
        ));
    }

    public function getBlockPrefix() {
        return 'proyecto_grupo_filter';
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'csrf_protection' => false,
            'validation_groups' => array('filtering') // avoid NotBlank() constraint-related message
        ));
    }

}
