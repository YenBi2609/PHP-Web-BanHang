<?php
session_start();
include_once './ketnoi.php';

if(isset($_POST["submit"])){
	$email=$_POST["email"];
	$pass=$_POST["pass"];
	if(isset($email) && isset($pass)){
		$sql = "select * from thanhvien where email='$email' and mat_khau='$pass'";
		$query = mysqli_query($conn,$sql);
		$rows = mysqli_num_rows($query);
		if($rows> 0){
			  $_SESSION["email"]= $email;
			  $_SESSION["pass"]= $pass;
			  header('location: quantri.php');
		}
	    else echo '<center class="alert alert-danger">Tài khoản không tồn tại hoặc bạn không có quyền truy cập</center>';
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Forms</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href="css/styles.css" rel="stylesheet">

</head>

<body>

	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
				<?php
				if(!isset($_SESSION['email'])){
				?>
					<form method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="pass" type="password" value="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<input type ="submit" name ="submit" class="btn btn-primary" value ="Login">
						</fieldset>
					</form>
					<?php
				}else header('location: quantri.php');
					?>
				</div>
			</div>
		</div>
	</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>
