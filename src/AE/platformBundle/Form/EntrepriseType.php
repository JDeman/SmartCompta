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
                    'PrestationDeService' => 'Prestation de service',
                    'VenteDeMarchandise' => 'Vente de marchandise',
                    'lesDeux' => 'Les deux',
                ),
                'expanded' => true
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
                )
            ))
            ->add('declaration', 'choice', array(
                'choices' => array(
                    'mensuelles' => 'Mensuelles',
                    'trimestrielles' => 'Trimestrielles',
                ),
                'expanded' => true
            ))
            ->add('date_de_lancement', 'date', array('label'  => 'Date de début activité'))
            ->add('accre', 'choice', array(
                'choices' => array(
                    'oui' => 'oui',
                    'non' => 'non',
                ),
                'expanded' => true
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
            ->add('enregistrer', 'submit', array('label'  => 'Enregistrer'))
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