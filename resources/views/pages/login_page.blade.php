<?php
	session_start();


	if(isset($_SESSION['login_user']) AND isset($_SESSION['user_type'])) {

		if($_SESSION["user_type"] == "admin"){
			header("location: admin_page.php");
			exit();
		}
		else {
			header("location: user_page.php");
			exit();
		}
	}
	else {
		// stay here
	}

	$error = "";

	if(isset($_POST['Login'])) {
		$error = "";
		// Username + Pass from form

		$username = $_POST['username'];
		$mypassword = $_POST['password'];


		$salt1    = "qm&h*";
		$salt2    = "pg!@";
		$token = hash('ripemd128', "$salt1$mypassword$salt2");


		$sql = "SELECT * FROM lab5_users WHERE username = '$username' AND password = '$token'";
		$answ = $conn->query($sql);
		$row = $answ->fetch_assoc();
		$user_type = $row['type'];

		if(isset($_POST['username'])) {
			session_start();
			$_SESSION["login_user"] = $username;
			$_SESSION["user_type"] = $user_type;

			if($_SESSION["user_type"] == "user") {
				header("Location: user_page.php");
				exit();
			}
			else if($_SESSION["user_type"] == "admin") {
				header("Location: admin_page.php");
				exit();
			}
			else {
			$error = "Your Login Name or Password is invalid";
			}
		}
	}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Log in to Website</title>

  <style>
    input {
      margin-bottom: 0.5em;
    }
  </style>
</head>

<body>

	<h1><span style="font-weight:bold;">Wait List Project Login Page</span></h1>

	<p style="color: red">
		<!--Placeholder for error messages-->
	</p>

	<form method="post" action="login_page.php">
		<label>Username: </label>
		<input type="text" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>"><br>

		<label>Password: </label>
		<input type="password" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>"><br>

		<input type="submit" name="Login" value="Log in"><br>
		<?php echo "<p styple = 'color: red'>" . $error . "</p>";?>
	</form>

	<p style="font-style:italic">
		Placeholder for "forgot password" link<br><br>
		Placeholder for "create account" link
	</p>

</body>

</html>
