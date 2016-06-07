<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'Uw :attribute moet geaccepteerd zijn.',
    'active_url'           => 'Uw :attribute is geen geldige URL.',
    'after'                => 'Uw :attribute moet een datum zijn na :date.',
    'alpha'                => 'Uw :attribute mag alleen letters bevatten.',
    'alpha_dash'           => 'Uw :attribute mag alleen letters, nummers en strepen bevatten.',
    'alpha_num'            => 'Uw :attribute mag alleen letters en numbers bevatten.',
    'array'                => 'Uw :attribute moet een array zijn.',
    'before'               => 'Uw :attribute moet een datum na :date zijn.',
    'between'              => [
        'numeric' => 'Uw :attribute moet tussen :min en :max zitten.',
        'file'    => 'Uw :attribute must be between :min and :max kilobytes.',
        'string'  => 'Uw :attribute moet tussen de :min en :max karakters bevatten.',
        'array'   => 'Uw :attribute moet tussen de :min en :max items bevatten.',
    ],
    'boolean'              => 'Uw :attribute moet juist of onjuist zijn.',
    'confirmed'            => 'Uw :attribute bevestiging komt niet overeen.',
    'date'                 => 'Uw :attribute is niet een correcte datum.',
    'date_format'          => 'Uw :attribute voldoet niet aan het formaat :format.',
    'different'            => 'Uw :attribute en :other moeten anders van elkaar zijn.',
    'digits'               => 'Uw :attribute moet :digits getallen lang zijn.',
    'digits_between'       => 'Uw :attribute moet tussen :min en :max getallen zijn.',
    'distinct'             => 'Uw :attribute heeft een bestaande waarde.',
    'email'                => 'Uw :attribute moet juist zijn.',
    'exists'               => 'Uw geselecteerde :attribute is onjuist.',
    'filled'               => 'Uw :attribute is verplicht in te vullen.',
    'image'                => 'Uw :attribute moet een afbeelding zijn.',
    'in'                   => 'Uw geselecteerde :attribute is onjuist.',
    'in_array'             => 'Uw :attribute bestaat niet in :other.',
    'integer'              => 'Uw :attribute moet een getal zijn.',
    'ip'                   => 'Uw :attribute moet een IP addres zijn.',
    'json'                 => 'Uw :attribute moet een JSON string zijn.',
    'max'                  => [
        'numeric' => 'Uw :attribute mag niet groter zijn dan :max.',
        'file'    => 'Uw :attribute mag niet groter zijn dan :max kilobytes.',
        'string'  => 'Uw :attribute mag niet langer zijn dan :max karakters.',
        'array'   => 'Uw :attribute mag niet meer hebben dan :max items.',
    ],
    'mimes'                => 'Uw :attribute moet het formaat: :values hebben.',
    'min'                  => [
        'numeric' => 'Uw :attribute moet op z\'n minst :min zijn.',
        'file'    => 'Uw :attribute moet op z\'n minst :min kilobytes groot zijn.',
        'string'  => 'Uw :attribute moet op z\'n minst :min karakters zijn.',
        'array'   => 'Uw :attribute moet op z\'n minst :min items bevatten.',
    ],
    'not_in'               => 'Uw geselecteerde :attribute is onjuist.',
    'numeric'              => 'Uw :attribute moet een getal zijn.',
    'present'              => 'Uw :attribute moet bestaan.',
    'regex'                => 'Het formaat van uw :attribute is onjuist.',
    'required'             => 'Uw :attribute is verplicht.',
    'required_if'          => 'Uw :attribute is verplicht wanneer :other is :value.',
    'required_unless'      => 'Uw :attribute is verplicht unless :other is in :values.',
    'required_with'        => 'Uw :attribute is verplicht wanneer :values aanwezig is.',
    'required_with_all'    => 'Uw :attribute is verplicht wanneer :values aanwezig is.',
    'required_without'     => 'Uw :attribute is verplicht wanneer :values niet aanwezig is.',
    'required_without_all' => 'Uw :attribute is verplicht wanneer er geen :values aanwezig zijn.',
    'same'                 => 'Uw :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'Uw :attribute moet :size groot zijn.',
        'file'    => 'Uw :attribute moet :size kilobytes groot zijn.',
        'string'  => 'Uw :attribute moet :size karakters bevatten.',
        'array'   => 'Uw :attribute moet :size items bevatten.',
    ],
    'string'               => 'Uw :attribute moet een string zijn.',
    'timezone'             => 'Uw :attribute moet een juiste tijdzone zijn.',
    'unique'               => 'Uw :attribute is al bezet.',
    'url'                  => 'Uw :attribute URL klopt niet.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
