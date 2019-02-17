<?php session_start(); ?>
<?php include('header.php'); ?>

<body>

<div class="center-form">
	<form action="checklogin.php" method="post">
		<label>Email:</label>
			<input type="text" name="login_email"><br>
		<label>Password:</label>
			<input type="text" name="password">
		<div class="buttonHolder">
			<input type="submit" name="Submit" class="button" value="Submit">
	</form>

<?php include('footer.php'); ?>