<?php 
	session_start();
	$errorMessage = '';
	$error1Message = '';
	$scm = "<strong>Success!</strong> create account, now you can log in with your username and password";
	if (isset($_GET['success'])) {
		$successMessage = $scm;
	} else {
		$successMessage = '';
	}
	include 'koneksi.php';
	if (isset($_POST['txtUserId']) && isset($_POST['txtPassword']) && !isset($_POST['txtEmail'])) {
		$userId = $_POST['txtUserId'];     
		$password = md5($_POST['txtPassword']); 
    	$sql = "SELECT user_id FROM tbl_auth_user WHERE user_id = '$userId' OR user_email = '$userId' AND user_password ='$password'";     
    	$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) == 1) {                 
				$_SESSION['login'] = true;
				$sql2 = "SELECT * FROM tbl_auth_user WHERE user_id = '$userId' OR user_email = '$userId'";
				$result2 = mysqli_query($conn, $sql2);
				if (mysqli_num_rows($result2) > 0) {
					while ($row = mysqli_fetch_assoc($result2)) {
						$_SESSION['user_name']=$row["user_name"];
						$_SESSION['lvl']=$row["user_level"];
					}
				}
        		header('Location: index.php');         
        		exit;
        } else {         
        	$errorMessage = 'Sorry, wrong user id / password';     
        }
    } elseif (isset($_POST['txtUserId']) && isset($_POST['txtPassword']) && isset($_POST['txtEmail']) && isset($_POST['txtUserName']) && isset($_POST['txtUserName'])) {
		$userId = $_POST['txtUserId'];     
		$password = md5($_POST['txtPassword']);
		$email = $_POST['txtEmail'];
		$username = $_POST['txtUserName'];
		$sql = "INSERT INTO tbl_auth_user(user_id, user_password, user_name, user_email, user_level)
		VALUES ('$userId','$password','$username','$email','user')";
    	if (mysqli_query($conn, $sql)) {
    		header("Location: login.php?success=1");
		} else {
    		$error1Message = 'Sorry, duplicate user_id detected!';
		}
    }
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/mystyle-login.css">
	<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/npm.js"></script>
	<title>Login</title>
</head>
<body>
	<div class="login-page">
		<div class="form">
			<?php
			    if ($successMessage != '') {
			      	echo "<br><div class='alert alert-success'>$successMessage</div>";
			   	}
			?>
			<form class="register-form" action="" method="post" name="frmRegister" id="frmRegister">
				<input type="text" placeholder="username" name="txtUserId" required="" />
				<input type="text" placeholder="Full Name" name="txtUserName" required="" />
			    <input type="password" placeholder="password" name="txtPassword" required="" />
			    <input type="email" placeholder="email address" name="txtEmail" required="" />
			    <?php
			      	if ($error1Message != '') {
			      		echo "<br><div class='alert alert-danger'>$error1Message</div>";
			      	}
			    ?>
			    <button name="btnNew" id="btnNew" type="submit">create</button>
			    <p class="message">Already registered? <a href="#">Sign In</a></p>
			</form>
			<form class="login-form" action="" method="post" name="frmLogin" id="frmLogin">
				<input type="text email" placeholder="username" name="txtUserId" id="txtUserId" autofocus="" required="" />
			    <input type="password" placeholder="password" name="txtPassword" id="txtPassword" required="" />
			    <button name="btnLogin" id="btnLogin" type="submit">login</button>
			    <?php
			      	if ($errorMessage != '') {
			      		echo "<br><div class='alert alert-danger'>$errorMessage</div>";
			      	}
			    ?>
			    <p class="message">Not registered? <a href="#">Create an account</a></p>
			</form>
			  </div>
			</div>

	<script type="text/javascript">
		$('.message a').click(function(){
   			$('form').animate({height: "toggle", opacity: "toggle"}, "normal");
		});
	</script>
</body>
</html>