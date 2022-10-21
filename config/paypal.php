<?php
/**
 * PayPal Setting & API Credentials
 * Created by Raza Mehdi <srmk@outlook.com>.
 */

return [
    'mode'    => "live", // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
    'sandbox' => [
        'client_id'         => "AdGSVd7ztMkYsXA5EhVe7bh8oJ2q8Sa0abGmyritI-0stEmJQyDAHpb0wCuecvV61bwggobsdR0NJvaN",
        'client_secret'     => "EBesO93gb4mfkMTSnukmZThkzjTCRUQnVRBCu8RLDgfliJC3TblpP4P86l9AVS8sK65QG2Az0JU-h9Zb",
//        'app_id'            => 'APP-80W284485P519543T',
    ],
    'live' => [
        'client_id'         => "AbSlp8iRUX8CSZbmWI6Qq35ypkwNGu7q3R4a2saV7RHpqv8YKpanDycvWC9LtfLvJ4-4m6kzHqf6tEBA",
        'client_secret'     => "EPzMYzrfMiao8TBkXSutXcLBy7D7QS9qNTADHzlAR6NrjrT0-oy9Sl2bfPYjZJdYL4LNqNH9c6rp1t3s",
//        'app_id'            => 'APP-80W284485P519543T',
    ],

    'payment_action' => env('PAYPAL_PAYMENT_ACTION', 'Sale'), // Can only be 'Sale', 'Authorization' or 'Order'
    'currency'       => env('PAYPAL_CURRENCY', 'USD'),
    'notify_url'     => env('PAYPAL_NOTIFY_URL', ''), // Change this accordingly for your application.
    'locale'         => env('PAYPAL_LOCALE', 'en_US'), // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
    'validate_ssl'   => env('PAYPAL_VALIDATE_SSL', true), // Validate SSL when creating api client.
];
