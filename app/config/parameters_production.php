<?php

    $db = parse_url(getenv('CLEARDB_DATABASE_URL'));

    $container->setParameter('database_driver', 'pdo_mysql');
    $container->setParameter('database_host', $db['host']);//$db['host']);
    $container->setParameter('database_port', $db['port']);//$db['port']);
    $container->setParameter('database_name', substr($db["path"], 1));//substr($db["path"], 1));
    $container->setParameter('database_user', $db['user']);//$db['user']);
    $container->setParameter('database_password', $db['pass']);//$db['pass']);
    $container->setParameter('secret', getenv('SECRET'));
    $container->setParameter('locale', 'en');
    $container->setParameter('mailer_transport', 'gmail');
    $container->setParameter('mailer_host', '127.0.0.1');
    $container->setParameter('mailer_user', 'testpst4a@gmail.com');
    $container->setParameter('mailer_password', 'pst4a1516');
