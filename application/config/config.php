<?php

/*
 *  APP Configuration: ENVIRONMENT & URL
 *
 */


// Define ENVIRONMENT for debugging

define('ENVIRONMENT', 'development');

if (ENVIRONMENT == 'development' || ENVIRONMENT == 'dev') {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}


// URL Configuration

// Public Folder
define('URL_PUBLIC_FOLDER', 'public');

// Protocol: 'http://' only http, 'https://' only https, '//' both
define('URL_PROTOCOL', '//');

// Get the domain
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);

// Subfolder: Files, keys, etc...
define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));

// Final URL built
define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER);

// JSON Path Path to json files instead of DB connection
 define('URL_DATA', 'data');

// The API KEY
define ('API_KEY', '50e491ca0f221d4406772ffa5c09d9ec1cc17c81');
