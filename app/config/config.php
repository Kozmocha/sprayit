<?php

// Database Parameters
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '123456');
define('DB_NAME', 'bookit');

// App Root
define('APPROOT', dirname(dirname(__FILE__)));

// URL Root
define('URLROOT', 'http://localhost/bookit');

// Site Name
define('SITENAME', 'BookIt');

// Site Motto
define('MOTTO', 'Let us set the <span class="red">appointments</span> so you have more time to do the things you <span class="green">need </span>to.');

// Pick Type Instructions
define('TYPEINSTRUCTIONS', '<span class="blue">Select</span> the type of <span class="pink">account</span> you\'ll be using <span class="purple">BookIt</span> for.');

// Coming soon!
define('COMINGSOON', 'This page is under construction!');

return [
    'google' => [
        'id' => '601469690265-ur4a5vfj2mkpeim0lhik9pjrvu4lruj1.apps.googleusercontent.com',
        'secret' =>'erGg1m-Msi8kxG93GwHnwNfP',
        'callback_url' => 'http://localhost/bookit',
        'scope' => ['https://www.googleapis.com/auth/userinfo.profile',
                    'https://www.googleapis.com/auth/userinfo.email',
                    'https://www.googleapis.com/auth/calendar']
    ]
];
