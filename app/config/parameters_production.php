<?php

    $db = parse_url(getenv('CLEARDB_DATABASE_URL'));

    $container->setParameter('database_driver', 'pdo_mysql');
    $container->setParameter('database_host', $db['host']);//'localhost');
    $container->setParameter('database_port', $db['port']);//'8889');
    $container->setParameter('database_name', substr($db["path"], 1));//'Symfony');
    $container->setParameter('database_user', $db['user']);//'root');
    $container->setParameter('database_password',  $db['pass']);//'root');
    $container->setParameter('secret', getenv('SECRET'));
    $container->setParameter('locale', 'en');
    $container->setParameter('mailer_transport', 'gmail');
    $container->setParameter('mailer_host', '~');
    $container->setParameter('mailer_user', 'testpst4a@gmail.com');
    $container->setParameter('mailer_password', 'pst4a1516');
