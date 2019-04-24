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

// SENDGRID API CONFIG

define('SENDGRID_KEY', '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');

define('NOREPLY_ADDRESS', 'noreply@sprayit.com');

define('NOREPLY_NAME', 'noreply');

define('REGISTRATION_EMAIL_SUBJECT', 'Welcome to SprayIt!');

define('REGISTRATON_EMAIL_BODY', 'Thank you for signing up for SprayIt. Your account has been verified and saved! You can now log in.');

// REDIRECT AND RENDER VIEW PATHS BELOW

define('POSTS_HOME', 'posts/index');

define('POSTS_SHOW', 'posts/show');

define('POSTS_ADD', 'posts/add');

define('LOGIN_PATH', 'users/login');

define('LOGOUT_PATH', 'users/logout');

define('REGISTER_PATH', 'users/register');

define('NOT_FOUND_PATH', 'pages/not_found');

define('UPDATE_USER', 'users/update');


