<!--Author: Ioannis Batsios-->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google-signin-client_id" content="{{client_id}}">
		<title><?php echo SITE_NAME ?></title>
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              rel="stylesheet"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              crossorigin="anonymous">
		<link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="<?php echo URL_ROOT; ?>/js/main.js"></script>
        <script src="https://apis.google.com/js/api/js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js"
                integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ"
                crossorigin="anonymous"></script>
		<![endif]-->
    <body>
    <?php require APP_ROOT . '/views/inc/navbar.php'; ?>
        <div class="container">
            <div class="wrap" style="margin-top: -75px;">
                <div class="row">
                    <div class="col-lg-12">
                        <h1><?php echo SITE_NAME ?></h1>
                    </div>
                </div>
	
