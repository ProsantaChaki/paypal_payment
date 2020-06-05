<?php
extract($_POST);

// For test payments we want to enable the sandbox mode. If you want to put live
// payments through then this setting needs changing to `false`.
$enableSandbox = true;

$paypalConfig = [
    'email' => 'abcd@business.example.com', //Enter Your sandbox business email 
];

$paypalUrl = $enableSandbox ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';

    $data = [];
    //All required information came from index file including payment information and url information
    foreach ($_POST as $key => $value) {
        $data[$key] = stripslashes($value);
    }

    // Set the PayPal account.
    $data['business'] = $paypalConfig['email'];

    // and currency so that these aren't overridden by the form data.]

    $data['amount']=$amount_total;
    $data['currency_code'] = 'USD';

    // Add any custom fields for the query string.
    //$data['custom'] = USERID;

    // Build the query string from the data.
    $queryString = http_build_query($data);

    // Redirect to paypal IPN
    echo($paypalUrl . '?' . $queryString);
    //header('location:' . $paypalUrl . '?' . $queryString);
    exit();

