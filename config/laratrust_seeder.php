<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'superadministrator' => [
            'users' => 'l,a,s,e,d',
            'profile' => 's,e'
        ],
        'administrator' => [
            'users' => 'l,a,s,e,d',
            'profile' => 's,e'
        ],
        'user' => [
            'profile' => 's,e',
        ],
        
    ],

    'permissions_map' => [
        'l' => 'list',
        'a' => 'add',
        's' => 'show',
        'e' => 'edit',
        'd' => 'destroy'
    ]
];
