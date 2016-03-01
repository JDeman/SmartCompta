<?php

namespace AE\DashBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RecettesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date')
            ->add('montant')
            ->add('client')
            ->add('modeDePaiement', 'choice', array(
                'choices' => array(
                    'CarteBancaire'   => 'Carte bancaire',
                    'Cheque' => 'Chèques',
                    'Especes'   => 'Espèces',
                )
            ))
            ->add('justificatif', 'file')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AE\DashBundle\Entity\Recettes'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ae_dashbundle_recettes';
    }
}