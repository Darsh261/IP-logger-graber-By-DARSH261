<?php
//Don't edit anything here
// Function to get the client's IP address
function getClientIP() {
    $ip = '';

    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } elseif (isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED'];
    } elseif (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_FORWARDED_FOR'];
    } elseif (isset($_SERVER['HTTP_FORWARDED'])) {
        $ip = $_SERVER['HTTP_FORWARDED'];
    } elseif (isset($_SERVER['REMOTE_ADDR'])) {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    return $ip;
}

// Get the user's IP address
$userIP = getClientIP();

// Load existing IP data from JSON file
$ipData = [];

$jsonFile = 'ips.json';
if (file_exists($jsonFile)) {
    $ipData = json_decode(file_get_contents($jsonFile), true);
}

// Add the current IP to the data
$ipData[] = $userIP;

// Save updated IP data to JSON file
file_put_contents($jsonFile, json_encode($ipData));

// Redirect the user to other Page
header("Location: index2.html");


//Coded By DARSH0P261
