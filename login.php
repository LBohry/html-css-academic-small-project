<?php  

require "functions.php";

$errors = array();
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit_button_name']))
{

	$errors = login($_POST);

	if(count($errors) == 0)
	{
		header("Location: pages/landing.php");
		die;
	}
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="pictures/tunisiaicon.png">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
	<title>Login</title>
</head>
<body>

	<div>
		<div>
			<?php if(count($errors) > 0):?>
				<?php foreach ($errors as $error):?>
					<?= $error?> <br>	
				<?php endforeach;?>
			<?php endif;?>

		</div>
        <div class="centered-container">
        <h1 class="loginh1">Login</h1>
		<form method="post" class="login-form">
        <input type="email" name="email" placeholder="Email" class="login-input"><br>
        <input type="password" name="password" placeholder="Password" class="login-input"><br>
        <br>
        <input type="submit" value="Login" name="submit_button_name" class="login-submit">
        <div class="login-footer">
        Don't have an account yet? <a href="index.php" class="signup-link">Create one now</a>.
        </div>
        </form>
        </div>
	</div>
</body>
</html>