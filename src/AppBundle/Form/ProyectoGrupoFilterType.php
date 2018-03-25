<?php

// ItemFilterType.php

namespace AppBundle\Form;

use Lexik\Bundle\FormFilterBundle\Filter\Query\QueryInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type as Filters;
use Symfony\Component\Form\Extension\Core\Type as Submit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

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

        $builder->add('codigoUtn', Filters\TextFilterType::class, array(
            'apply_filter' => function(QueryInterface $filterQuery, $field, $values) {
                if (!empty($values['value'])) {
                    $qb = $filterQuery->getQueryBuilder();
                    $qb->andWhere($filterQuery->getExpr()->like($field, ':codigoUtn'));
                    $qb->setParameter('codigoUtn', '%' . $values['value'] . '%');
                }
            }
        ));

        $builder->add('nombre', Filters\TextFilterType::class, array(
            'apply_filter' => function(QueryInterface $filterQuery, $field, $values) {
                if (!empty($values['value'])) {
                    $qb = $filterQuery->getQueryBuilder();
                    $qb->andWhere($filterQuery->getExpr()->like($field, ':nombre'));
                    $qb->setParameter('nombre', '%' . $values['value'] . '%');
                }
            }
        ));

        $builder->add('filter', Submit\SubmitType::class, array(
            'label' => 'Filtrar',
            'attr' => array('class' => 'btn btn-info'),
        ));

        $builder->add('reset', Submit\SubmitType::class, array(
            'label' => 'Reiniciar',
            'attr' => array('class' => 'btn btn-danger'),
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
