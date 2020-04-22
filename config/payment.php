<?php

return [

    /*
    |--------------------------------------------------------------------------
    | CCAvenue configuration file
    |--------------------------------------------------------------------------
    |   gateway = CCAvenue
    |   view    = File
     */

    'gateway' => 'CCAvenue', // Making this option for implementing multiple gateways in future

    //'testMode' => true, // True for Testing the Gateway [For production false]
    'testMode' => false, // replace true with false ..............
    

    'ccavenue' => [ // CCAvenue Parameters
        'merchantId' => env('CCAVENUE_MERCHANT_ID', '123456'),
        'accessCode' => env('CCAVENUE_ACCESS_CODE', 'test'),
        'workingKey' => env('CCAVENUE_WORKING_KEY', 'test'),

        // Should be route address for url() function
        'redirectUrl' => env('CCAVENUE_REDIRECT_URL', 'payment/success'),
        'cancelUrl' => env('CCAVENUE_CANCEL_URL', 'payment/cancel'),

        'currency' => env('CCAVENUE_CURRENCY', 'INR'),
        'language' => env('CCAVENUE_LANGUAGE', 'EN'),
    ],

    // Add your response link here. In Laravel 5.* you may use the api middleware instead of this.
    'remove_csrf_check' => [
        'payment/response',
        'payment/success', // add success and cancel to avoid token csrf
        'payment/cancel', // add success and cancel to avoid token csrf
    ],

];
