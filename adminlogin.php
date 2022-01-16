<!DOCTYPE html>
<html>
<head>
 <title>Admin Login</title>
  <link rel = "icon" href = "images/pic5.jpg" type = "image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
	body{
	 /*background-image: url("images/pic3.jpg");
          background-repeat:no-repeat;
          background-size:100%;*/
          background-color: lightblue;
         

	}
	.loginbox{
		width: 250px;
		height:300px;
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
	.loginbox  input[type="uname"], input[type="password"]{
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

@media only screen and (max-width: 320px){
	body{
		background-size: auto;
	}
}

</style>
</head>
<body><div>
	<footer>
<a href="newlogreg.php" style="padding: 10px; font-size: 25px;">Back</a>
</footer></div>
	<div class="loginbox">
		<img src="images/avatar1.png" class="avatar">
<form action="" method="post">
	<label>User Name</label><br>
	<input type="uname" name="uname" placeholder="Enter User Name" required><br><br>
	<label>Password</label><br>
	<input type="Password" name="psw" placeholder="Enter Password" required=""><br><br>
	
	<input type="submit" name="submit" value="Sign in">
<?php
session_start();
include('conn.php');
if (isset($_POST['submit'])){

	$uname = $_POST['uname'];
	$psw = $_POST['psw'];
	

	$sql = "SELECT * FROM adminlog WHERE username = '$uname' AND psw ='$psw'";
    
    $result = mysqli_query($conn,$sql);

    $row = mysqli_fetch_array($result);
     if(is_array($row)){
    	$_SESSION['username'] = $row1['username'];
    }
    

    if($row['email'] == $email and $row['psw'] == $psw){
      echo "Login successfull";
      header("Location:admincriminals.php");
    } else {
     
      
      echo "<script>alert('Admin Failed to LOGIN!!!')</script>";
    }

    mysqli_close($conn);

}
?>
</form>
</div>




	
</body>
</html>

