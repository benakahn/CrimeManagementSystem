<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
 <title>LOGIN AND REGISTRATION FORM</title>
  <link rel = "icon" href = "images/pic5.jpg" type = "image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
	body{
          background-color: lightblue;
	}
	.loginbox{
		width: 250px;
		height:320px;
		background: black;
		color: #fff;
		top: 60%;
		left: 50%;
		position: absolute;
		transform: translate(-50%,-50%);
		box-sizing: border-box;
		padding: 70px 30px;
	}
	.avatar{
		width: 100px;
		height: 100px;
		border-radius: 50%;
		position: absolute;
		top: -50px;
		left: calc(50% - 50px);
	}
	.loginbox label{
		margin: 0;
		padding: 0;
		font-weight: bold;
	}
	.loginbox  input[type="uid"], input[type="password"]{
		width: 100%;
	margin-bottom: 10px;
		border: none;
		border-bottom:1px solid black;
		background: transparent;
		outline: none;
		height: 40px;
		color: #fff;
	}
	.loginbox input[type="submit"]{
		border: none;
		outline: none;
		height: 20px;
		background: #03b6fc;
		border-radius: 20px;
		font-size: 18px;
		padding: 0;
		width: 75px;
		height: 25px;
		color: white;
		margin-left: 50px;
	} 

	.loginbox input[type="submit"]:hover{
		cursor: pointer;
		background: #ddd;
		color: black;
	}
	
	footer{
	
	}
	footer a:visited{
		color : red;
	}
	footer a:hover{
		color: yellow;
	}
	footer a{
		text-decoration: none;

	}

	.loginbox a{
		text-decoration: none;
		color: #03b6fc;
	}

@media only screen and (max-width: 320px){
	body{
		background-size: 100%;
	}
}

</style>
</head>
<body><div>
	<footer>
<a href="index.php" style=" font-size: 30px; float: right;">Back</a>
<b style="font-size: 20px, background-color : red;">click here for</b>
<a href="adminlogin.php" style=" font-size: 20px;">Admin Login</a></footer></div>
	<div class="loginbox">
		<img src="images/avatar2.png" class="avatar">
<form action="" method="post">
	<label>UID</label><br>
	<input type="uid" name="uid" placeholder="Enter Unique Id" required><br><br>
	<label>Password</label><br>
	<input type="Password" name="psw" placeholder="Enter Password" required=""><br><br>
	
	<input type="submit" name="submit" value="Sign in"><br>
	<i>If you are a new user please enter <b>password</b> as your <b>UID</b></i>
<?php
include('conn.php');
if (isset($_POST['submit'])){

	$uid = $_POST['uid'];
	$psw = $_POST['psw'];
	$hashpsw = md5($psw);

	$sql = "SELECT * FROM login WHERE uid = '$uid' AND psw ='$hashpsw'";
   	$sql1 = "SELECT * from police WHERE uid = '$uid'";
    
    $result = mysqli_query($conn,$sql);
    $result1 = mysqli_query($conn,$sql1);

    $row = mysqli_fetch_array($result);
    $row1 = mysqli_fetch_array($result1);
    if(is_array($row1)){
    	$_SESSION['pname'] = $row1['pname'];
    	$_SESSION['uid'] = $uid;
    }

    if($row['uid'] == $uid and $row['psw'] == $hashpsw ){
      	echo "Login successfull";
      header("Location:home.php");
    }
   else {
      echo "<script>alert('User Failed to LOGIN!!!')</script>";
    }

    mysqli_close($conn);

}
?>
</form>
</div>

</body>
</html>

