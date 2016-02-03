<?php
/**
 * Created by PhpStorm.
 * User: Florence
 * Date: 20/11/2015
 * Time: 02:24
 */

namespace AE\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProfileType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text')
            ->add('prenom', 'text')
            ->add('adresse', 'textarea')
            ->add('code_postal', 'integer')
            ->add('telephone', 'number')
        ;
    }

    public function getParent()
    {
        return 'fos_user_profile';
    }

    public function getName()
    {
        return 'ae_user_profile';
    }

}