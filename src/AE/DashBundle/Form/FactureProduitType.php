<?php

namespace AE\DashBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FactureProduitType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('quantite', 'number', array('label' => 'Quantité'))
            ->add('produits', new ProduitsType())
            /*->add('prixTotalHT', 'text', array(
                'label' => 'Prix Total HT',
                'required' => false
            ))*/
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AE\DashBundle\Entity\FactureProduit'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ae_dashbundle_factureproduit';
    }
}
