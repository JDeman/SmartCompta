<?php
/**
 * Created by PhpStorm.
 * User: Florence
 * Date: 23/11/2015
 * Time: 21:48
 */

namespace AE\platformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntrepriseType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('activite', 'choice', array(
                'choices' => array(
                    'PrestationDeService' => 'Prestation de service (commerciales ou artisanales, RSI-BIC)',
                    'VenteDeMarchandise' => 'Vente de marchandises (RSI-BIC)',
                    'AutresPrestationsDeService' => 'Autres prestations de service (RSI-BNC)',
                    'ActiviteLiberale' => 'Activité libérale (CIPAV-BNC)',
                ),
                'choices_as_values' => true,
                'expanded' => false,
                'choice_label' => function ($value, $key, $index) {
                    if ($key == 'PrestationDeService') {
                        return 'Prestation de service (commerciales ou artisanales, RSI-BIC)';
                    }
                    if ($value == 'Vente de marchandises (RSI-BIC)') {
                        return 'Vente de marchandises (RSI-BIC)';
                    }
                    if ($value == 'Autres prestations de service (RSI-BNC)') {
                        return 'Autres prestations de service (RSI-BNC)';
                    }
                    if ($value == 'Activité libérale (CIPAV-BNC)') {
                        return 'Activité libérale (CIPAV-BNC)';
                    }
                    return strtoupper($key);
                },
            ))
            ->add('secteur_d_activite', 'choice', array(
                'choices' => array(
                    'Web&Informatique'   => 'Web et Informatique',
                    'Consulting&Service' => 'Consulting et Services',
                    'Sante&BienEtre'   => 'Santé et Bien-Être',
                    'Commercant'   => 'Commerçant',
                    'ServiceALaPersonne'   => 'Service à la personne',
                    'BTP&Artisans'   => 'BTP et artisans',
                    'ArtPhotoMusique'   => 'Art, photo et musique',
                    'Restauration'   => 'Restauration',
                    'Transport'   => 'Transport',
                    'Autres'   => 'Autres',
                ),
                'choices_as_values' => true,
                'choice_label' => function ($value, $key, $index) {
                    if ($key == 'Web&Informatique') {
                        return 'Web et Informatique';
                    }
                    if ($key == 'Consulting&Service') {
                        return 'Consulting et Services';
                    }
                    if ($key == 'Sante&BienEtre') {
                        return 'Santé et Bien-Être';
                    }
                    if ($key == 'Commercant') {
                        return 'Commerçant';
                    }
                    if ($key == 'ServiceALaPersonne') {
                        return 'Service à la personne';
                    }
                    if ($key == 'BTP&Artisans') {
                        return 'BTP et artisans';
                    }
                    if ($key == 'ArtPhotoMusique') {
                        return 'Art, photo et musique';
                    }
                    if ($key == 'Restauration') {
                        return 'Restauration';
                    }
                    if ($key == 'Transport') {
                        return 'Transport';
                    }
                    if ($key == 'Autres') {
                        return 'Autres';
                    }
                    return strtoupper($key);
                },
            ))
            ->add('declaration', 'choice', array(
                'choices' => array(
                    'mensuelles' => 'Mensuelles',
                    'trimestrielles' => 'Trimestrielles',
                ),
                'choices_as_values' => true,
                'expanded' => true
            ))
            ->add('liberatoire', 'checkbox', array(
                'required' => false
            ))
            ->add('date_de_lancement', 'date', array('label'  => 'Date de début activité'))
            ->add('accre', 'checkbox', array(
                'required' => false
            ))
            //->add('nom', 'text', array('label'  => 'Nom du dirigeant'))
            //->add('prenom', 'text', array('label'  => 'Prénom du dirigeant'))
            ->add('email_entreprise', 'email', array('label'  => 'E-mail'))
            ->add('telephone_entreprise', 'number', array('label'  => 'Numéro de téléphone'))
            ->add('adresse_entreprise', 'textarea', array('label'  => 'Adresse'))
            ->add('code_postal_entreprise', 'number', array('label'  => 'Code postal'))
            //->add('ville', 'text', array('label'  => 'Ville'))
            //->add('pays', 'country', array('label'  => 'Pays'))
            ->add('siret', 'number', array('label'  => 'SIRET/SIREN'))
            ->add('nom_entreprise', 'text', array('label'  => 'Nom commercial'))
            ->add('naf_id', 'text', array('label'  => 'Code NAF/APE'))
            ->add('ville_rcs', 'text', array('label'  => 'Ville immatriculation au RCS'))
            ->add('chiffre_d_affaire_mensuel', 'money', array('label'  => 'Chiffre affaire mensuel'))
            //->add('enregistrer', 'submit', array('label'  => 'Enregistrer'))
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AE\platformBundle\Entity\Entreprise',
        ));
    }

    public function getName()
    {
        return 'ae_user_entreprise';
    }


}