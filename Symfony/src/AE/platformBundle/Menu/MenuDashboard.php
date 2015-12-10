<?php
/**
 * Created by PhpStorm.
 * User: Florence
 * Date: 22/11/2015
 * Time: 00:09
 */

namespace AE\platformBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class MenuDashboard extends ContainerAware
{

    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->addChild('Livre des recettes');

        $menu->addChild('Registre des achats');

        $menu->addChild('Facturation');

        $menu->addChild('Compte bancaire');
        $menu['Facturation']->addChild('Compte 1');

        $menu->addChild('Devis');

        /*$menu->addChild('Profil', array('route' => 'fos_user_profile_show'));
        $menu['Profil']->addChild('Editer le profil', array('route' => 'fos_user_profile_edit'));
        $menu['Profil']->addChild('Déconnexion', array('route' => 'fos_user_security_logout'));*/

        return $menu;
    }

}