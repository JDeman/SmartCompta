<?php
/**
 * Created by PhpStorm.
 * User: julo
 * Date: 12/11/15
 * Time: 21:23
 */

namespace AE\UserBundle\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use FOS\UserBundle\Command\CreateUserCommand as BaseCommand;

class CreateUserCommand extends BaseCommand
{
/**
* @see Command
*/
    protected function configure()
    {
        parent::configure();
        $this
            ->setName('AE:user:create')
            ->getDefinition()->addArguments(array(
                new InputArgument('nom', InputArgument::REQUIRED, 'The lastname'),
                new InputArgument('prenom', InputArgument::REQUIRED, 'The firstname')
            ))
        ;
        $this->setHelp(<<<EOT
// L'aide qui va bien
EOT
        );
    }

    /**
     * @see Command
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $username   = $input->getArgument('username');
        $email      = $input->getArgument('email');
        $password   = $input->getArgument('password');
        $nom        = $input->getArgument('nom');
        $prenom     = $input->getArgument('prenom');
        $siretId    = $input->getArgument('siretId');
        $nafId      = $input->getArgument('nafId');
        $inactive   = $input->getOption('inactive');
        $superadmin = $input->getOption('super-admin');

        /** @var \FOS\UserBundle\Model\UserManager $user_manager */
        $user_manager = $this->getContainer()->get('fos_user.user_manager');

        /** @var \AE\UserBundle\Entity\User $user */
        $user = $user_manager->createUser();
        $user->setUsername($username);
        $user->setEmail($email);
        $user->setPlainPassword($password);
        $user->setEnabled((Boolean) !$inactive);
        $user->setSuperAdmin((Boolean) $superadmin);
        $user->setNom($nom);
        $user->setPrenom($prenom);
        $user->setNafId($nafId);
        $user->setSiretId($siretId);

        $user_manager->updateUser($user);

        $output->writeln(sprintf('Created user <comment>%s</comment>', $username));
    }

    /**
     * @see Command
     */
    protected function interact(InputInterface $input, OutputInterface $output)
    {
        parent::interact($input, $output);
        if (!$input->getArgument('nom')) {
            $nom = $this->getHelper('dialog')->askAndValidate(
                $output,
                'Please choose a lastname:',
                function($nom) {
                    if (empty($nom)) {
                        throw new \Exception('Lastname can not be empty');
                    }

                    return $nom;
                }
            );
            $input->setArgument('nom', $nom);
        }
        if (!$input->getArgument('prenom')) {
            $prenom = $this->getHelper('dialog')->askAndValidate(
                $output,
                'Please choose a firstname:',
                function($prenom) {
                    if (empty($prenom)) {
                        throw new \Exception('firstname can not be empty');
                    }

                    return $prenom;
                }
            );
            $input->setArgument('prenom', $prenom);
        }
    }
}