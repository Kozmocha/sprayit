<?php

// MySqlTranslator Parameters
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'sprayit');

// App Root
define('APP_ROOT', dirname(dirname(__FILE__)));

// URL Root
define('URL_ROOT', 'http://localhost/sprayit');

// DB Translator Name
define('DB_TRANSLATOR', 'MySqlTranslator');

// Site Name
define('SITE_NAME', 'SprayIt');

// Site Motto
define('MOTTO', 'We don\'t moderate like those panzies <span class="pink"> Facebook </span>and <span class="pink">Twitter</span>!<br/> <span class="red">SPRAY</span> whatever you <span class="green">WANT!</span>');

// MAILGUN API CONFIG

define('MAILGUN_API_KEY', 'pubkey-bb2b4211a26b64d8ad7e0f75999244c0');

define('MAILGUN_API_PUBKEY', 'pubkey-bb2b4211a26b64d8ad7e0f75999244c0');

define('MAILGUN_DOMAIN', 'sandbox75886ec4e1654bcf8899d6e3528f9405.mailgun.org');

define('MAILGUN_LIST', 'test@sandbox75886ec4e1654bcf8899d6e3528f9405.mailgun.org');

define('MAILGUN_SECRET', 'secret');

// REDIRECT AND RENDER VIEW PATHS BELOW

define('POSTS_HOME', 'posts/index');

define('POSTS_SHOW', 'posts/show');

define('POSTS_ADD', 'posts/add');

define('LOGIN_PATH', 'users/login');

define('LOGOUT_PATH', 'users/logout');

define('REGISTER_PATH', 'users/register');

define('NOT_FOUND_PATH', 'pages/not_found');

define('UPDATE_USER', 'users/update');


