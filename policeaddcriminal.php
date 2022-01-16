<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Police | Add Criminals details</title>
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
		height:108%;
		background: black;
		color: #fff;
		top: 60%;
		left: 50%;
		position: absolute;
		transform: translate(-20%,-50%);
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
<a href="policecriminals.php" style=" font-size: 30px; float: right;">Back</a></footer></div>
<div class="registerbox">
		<img src="images/avatar.jpg" class="avatar">
<form action="" method="POST">
	<label>Criminal ID</label>
	<input type="text" name="cid" placeholder="uid" required="">
	<label>Police UID</label>
	<input type="text" name="puid" value="<?php echo $_SESSION['uid']; ?>" disabled="true">
	<label>Crime Name</label>
	<select name='crid' style="background-color:black;"  type="text"><option  style="background-color:black;" disabled selected>--Select Crime--</option>
		<?php
		include 'conn.php';
		$sql = "SELECT crid,crname from crime";
		$result = $conn-> query($sql);
		if($result-> num_rows > 0)
    {
		while($row = $result-> fetch_assoc()){
			echo "<option style='background-color:black;' value=".$row['crid'].">".$row['crname']."</option>";
		}
	}
		mysqli_close($conn);
		?>
	</select><br><br>
	<lable>Name</lable>
	<input type="text" name="cname" placeholder="Name" required="">
	<label>Email</label>
	<input type="text" name="cemail" placeholder="Email" required="">
	<label>Address</label>
	<input type="text" name="caddress" placeholder="Address" required="">
	<label>Phone</label>
	<input type="Number" name="cphone" placeholder="Phone Number" maxlength="11">
	<label>Weight</label>
	<input type="text" name="cweight" placeholder="Weight" required="">
	<label>Height</label>
	<input type="text" name="cheight" placeholder="Height" required="">
	<input type="submit"name="add" value="ADD">
<?php
include('conn.php');
if (isset($_POST['add'])) {
	$cid = $_POST['cid'];
	$puid =$_SESSION['uid'];
	$crid = $_POST['crid'];
	$cname = $_POST['cname'];
	$cemail = $_POST['cemail'];
	$cphone = $_POST['cphone'];
	$caddress = $_POST['caddress'];
	$cweight = $_POST['cweight'];
	$cheight = $_POST['cheight'];

	$sql = "INSERT INTO criminal (cid,puid,crid,cname,cemail,cphone,caddress,cweight,cheight) VALUES ('$cid','$puid','$crid','$cname','$cemail','$cphone','$caddress','$cweight','$cheight')";
  
    if (mysqli_query($conn, $sql)) {
    echo "<script>alert('New record created successfully')</script>";
    header("Location : policecriminals.php");
     
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