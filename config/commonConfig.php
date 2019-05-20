<?php

return [
    /*
    |
    | List number of records per page while pagination
    |
     */

    'list_num_of_records_per_page' => 25,

    /*
    |
    | Descriptions of routes
    |
     */

    'routes' => [
        'delete' => [
            'display_name' => 'Delete',
            'description' => 'Deletes the'
        ],
        'index' => [
            'display_name' => 'List of',
            'description' => 'Lists the'
        ],
        'create' => [
            'display_name' => 'Add',
            'description' => 'Adds the'
        ],
        'store' => [
            'display_name' => 'Stores',
            'description' => 'Stores the'
        ],
        'show' => [
            'display_name' => 'Shows',
            'description' => 'Shows the'
        ],
        'edit' => [
            'display_name' => 'Edit',
            'description' => 'Edits the'
        ],
        'update' => [
            'display_name' => 'Update',
            'description' => 'Updates the'
        ],
        'destroy' => [
            'display_name' => 'Delete',
            'description' => 'Deletes the'
        ]
    ],
    'dashboard_routes' => [
        'names' => [
            'index',
            'create'
        ]
    ],
    'route_prefixes_not_req' => [
        'names' => [
            'debugbar',
            'user',
            'role',
            'home',
            'login',
            'loginUser',
            'registerUser'
        ],

    ],


    'admin_rights_default' => [
        'debugbar',
        'user',
        'role',
        'home',
    ],
    

];
