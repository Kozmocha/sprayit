<?php

// Load Configuration file
require_once 'config/config.php';

// Autoload Core Libraries
spl_autoload_register(function($_className) {
    require_once 'libraries/' . $_className . '.php';
});

