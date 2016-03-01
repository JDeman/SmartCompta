<?php

namespace AE\DashBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContractuelsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomContractuel', 'text')
            ->add('adresseContractuel', 'textarea')
            ->add('codePostalContractuel')
            ->add('formeJuridiqueContractuel', 'text')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AE\DashBundle\Entity\Contractuels'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ae_dashbundle_contractuels';
    }
}
