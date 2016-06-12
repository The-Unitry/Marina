<?php

return [
    'roles' => [
        [
            'id' => 1,
            'name' => 'superadmin'
        ],
        [
            'id' => 2,
            'name' => 'admin'
        ],
        [
            'id' => 3,
            'name' => 'manager'
        ],
        [
            'id' => 4,
            'name' => 'user'
        ],
        [
            'id' => 5,
            'name' => 'visitor'
        ]
    ],
    'settings' => [
        [
            'key' => 'company_name',
            'value' => 'Bedrijfsnaam',
        ],
        [
            'key' => 'company_mail',
            'value' => 'info@bedrijfsnaam.nl',
        ],
        [
            'key' => 'company_address',
            'value' => 'Straatnaam 1',
        ],
        [
            'key' => 'company_zipcode',
            'value' => '1234 AB',
        ],
        [
            'key' => 'company_city',
            'value' => 'Amsterdam',
        ],
        [
            'key' => 'company_phone',
            'value' => '020-1234567',
        ],
        [
            'key' => 'tax',
            'value' => '21',
        ],
        [
            'key' => 'tourist_tax',
            'value' => '1,00',
        ],
        [
            'key' => 'bank_account',
            'value' => 'NL01 INGB 0000 0000 00',
        ]
    ],
    'scaffolds' => [
        [
            'code' => 'not_approved',
            'hidden' => '1',
        ],
    ]
];