<?php

declare(strict_types=1);

use Mezzio\Authentication\DefaultUserFactory;
use Mezzio\Authentication\UserInterface;

return [
    // Provides application-wide services.
    // We recommend using fully-qualified class names whenever possible as
    // service names.
    'dependencies' => [
        // Use 'aliases' to alias a service name to another service. The
        // key is the alias name, the value is the service to which it points.
        'aliases' => [
            \Mezzio\Authentication\AuthenticationInterface::class => \Mezzio\Authentication\Session\PhpSession::class,
            \Mezzio\Authentication\UserRepositoryInterface::class => \Mezzio\Authentication\UserRepository\PdoDatabase::class,
            \Mezzio\Session\SessionPersistenceInterface::class => \Mezzio\Session\Ext\PhpSessionPersistence::class
        ],
        'factories' => [
            UserInterface::class => DefaultUserFactory::class,
        ]
    ],
    'authentication' => [
        'redirect' => '/login',
        'pdo' => [
            'dsn' => 'sqlite:/var/www/database.sqlite',
            'table' => 'users',
            'field' => [
                'identity' => 'username',
                'password' => 'password',
            ],
            'sql_get_roles'   => 'SELECT role FROM users WHERE username = :identity',
            'sql_get_details' => 'SELECT username FROM users WHERE username = :identity',
        ],
    ],
];
