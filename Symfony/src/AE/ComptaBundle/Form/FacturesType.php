<?php

namespace AE\ComptaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FacturesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('client')
            ->add('date')
            ->add('produit')
            ->add('quantite')
            ->add('prixUnitaireHT')
            ->add('prixTotalHT')
            ->add('recetteTotaleHT')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AE\ComptaBundle\Entity\Factures'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ae_comptabundle_factures';
    }
}