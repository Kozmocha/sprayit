<?php

session_start();

// Load Configuration file
require_once 'config/config.php';

<<<<<<< HEAD
require_once __DIR__ . '/../vendor/autoload.php';

=======
>>>>>>> 7aee0329b603842ae9a36944b3956e7c950aee86
// Autoload BookitCore Libraries
spl_autoload_register(function($_className) {
    require_once 'libraries/' . $_className . '.php';

});


