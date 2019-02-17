<?php session_start(); 
include('header.php');
require_once "checklogin.php";
$loginURL = $client->createAuthUrl();

?>
<body>
<div class="container" style="margin-top: 100px">
	<div class="row justify-content-center">
			<div class="col-md-6 col-offset-3" align="center">
				<form action="checklogin.php" method="post">
					<input placeholder="Email" name="Email" class="form-control"><br />
					<input placeholder="Password" type="password" name="password"  class="form-control"><br />
					<input type="submit" value="Log In" class="btn btn-primary">
					<input type="button" onclick="window.location = '<?php echo $loginURL ?>';" value="Log In With Google" class="btn btn-danger">
				</form>
			</div>
		</div>
	</div>

<?php include('footer.php'); ?>