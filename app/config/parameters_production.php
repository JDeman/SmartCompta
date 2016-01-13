<?php

    $db = parse_url(getenv('CLEARDB_DATABASE_URL'));

    $container->setParameter('database_driver', 'pdo_mysql');
    $container->setParameter('database_host', 'localhost');//$db['host']);//'localhost');
    $container->setParameter('database_port', '8889');//$db['port']);//'8889');
    $container->setParameter('database_name', 'Symfony');//substr($db["path"], 1));//'Symfony');
    $container->setParameter('database_user', 'root');//$db['user']);//'root');
    $container->setParameter('database_password', 'root');// $db['pass']);//'root');
    $container->setParameter('database_host', 'localhost');//$db['host']);
    $container->setParameter('database_port', '8889');//$db['port']);
    $container->setParameter('database_name', 'symfony');//substr($db["path"], 1));
    $container->setParameter('database_user', 'root');//$db['user']);
    $container->setParameter('database_password', 'root');//$db['pass']);
    $container->setParameter('secret', getenv('SECRET'));
    $container->setParameter('locale', 'en');
    $container->setParameter('mailer_transport', 'gmail');
    $container->setParameter('mailer_host', '127.0.0.1');
    $container->setParameter('mailer_user', 'testpst4a@gmail.com');
    $container->setParameter('mailer_password', 'pst4a1516');
