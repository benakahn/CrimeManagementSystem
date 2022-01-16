<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin | Add Poilice details</title>
	<link rel = "icon" href = "images/pic5.jpg" type = "image/x-icon">
     <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <style type="text/css">
	body{
	 /*background-image: url("images/pic3.jpg");
          background-repeat:no-repeat;
          background-size:100%;*/
          background-color: lightblue;
         

	}
	
	.registerbox{
		width: 250px;
		height:78%;
		background: black;
		color: #fff;
		top: 60%;
		left: 50%;
		position: absolute;
		transform: translate(-50%,-50%);
		box-sizing: border-box;
		padding: 50px 30px;
	}
	.avatar{
		width: 100px;
		height: 100px;
		border-radius: 50%;
		position: absolute;
		top: -50px;
		left: calc(50% - 50px);
	}
	.registerloginbox label{
		margin: 0;
		padding: 0;
		font-weight: bold;
	}
	.registerbox input[type="email"],input[type="text"], input[type="password"],input[type="Number"]{
		width: 100%;
	margin-bottom: 10px;
		border: none;
		border-bottom:1px solid black;
		background: transparent;
		outline: none;
		height: 40px;
		color: #fff;
	}
	.registerbox input[type="submit"]{
		border: none;
		outline: none;
		height: 20px;
		background: #03b6fc;
		border-radius: 20px;
		font-size: 18px;
		padding: 5px 10px 6px 10px;
		width: 80px;
		height: 25px;
		color: white;
		margin-left: 60px;
	} 

	.registerbox input[type="submit"]:hover{
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
	.registerbox a{
		text-decoration: none;
		color: #03b6fc;
	}

@media only screen and (max-width: 320px){
	body{
		background-size: auto;
	}
}
</style>
</head>
<body>
<div>
	<footer>
<a href="adminpolice.php" style=" font-size: 30px; float: right;">Back</a></footer></div>
<div class="registerbox">
		<img src="images/avatar2.png" class="avatar">
<form action="" method="POST">
	<label>UID</label>
	<input type="text" name="uid" placeholder="uid" required="">
	<lable>Name</lable>
	<input type="text" name="pname" placeholder="Name" required="">
	<label>Email</label>
	<input type="text" name="pemail" placeholder="Email" required="">
	<label>Address</label>
	<input type="text" name="paddress" placeholder="Address" required="">
	<label>Phone</label>
	<input type="Number" name="pphone" placeholder="Phone Number" maxlength="11">
	<label>Description</label>
	<input type="text" name="pdesc" placeholder="Description" required="">
	<input type="submit"name="add" value="ADD">
<?php
include('conn.php');
if (isset($_POST['add'])) {
	$uid = $_POST['uid'];
	$pname = $_POST['pname'];
	$pemail = $_POST['pemail'];
	$psw = md5($uid);
	$pphone = $_POST['pphone'];
	$paddress = $_POST['paddress'];
	$pdesc = $_POST['pdesc'];

	$sql = "INSERT INTO police (uid,pname,pemail,psw,pphone,paddress,pdesc) VALUES ('$uid','$pname','$pemail','$psw','$pphone','$paddress','$pdesc')";
  
    if (mysqli_query($conn, $sql)) {
    echo "<script>alert('New record created successfully')</script>";
    header("Location : adminpolice.php");
     
      } else {
    echo "<script>alert('404!!!')</script>";
    }
    mysqli_close($conn);

}

?>
</form>
</div>
</body>
</html>