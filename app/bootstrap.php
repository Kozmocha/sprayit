<?php

session_start();

// Load Configuration file
require_once 'config/config.php';

require_once __DIR__ . '/../vendor/autoload.php';

// Autoload BookitCore Libraries
spl_autoload_register(function($_className) {
    require_once 'libraries/' . $_className . '.php';

});


