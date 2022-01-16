<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Police Panel</title>
     <link rel = "icon" href = "images/pic5.jpg" type = "image/x-icon">
     <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
	<style type="text/css">
     @import url('https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap');

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  list-style: none;
  text-decoration: none;
  font-family: 'Josefin Sans', sans-serif;
}

body{
   background-color: #fff;
}

.wrapper{
  display: flex;
  position: relative;
}

.wrapper .sidebar{
  width: 200px;
  height: 100%;
  background: #03b6fc;
  padding: 30px 0px;
  position: fixed;
}

.wrapper .sidebar h2{
  color: #fff;
  text-transform: uppercase;
  text-align: center;
  margin-bottom: 30px;
}

.wrapper .sidebar ul li{
  padding: 15px;
  border-bottom: 1px solid #bdb8d7;
  border-bottom: 1px solid rgba(0,0,0,0.05);
  border-top: 1px solid rgba(255,255,255,0.05);
}    

.wrapper .sidebar ul li a{
  color: #fff;
  display: block;
}
.hidden{
  overflow: hidden
}
.wrapper .sidebar ul li a .fas{
  width: 25px;
}

.wrapper .sidebar ul li:hover{
  background-color: #03b6fc;
}
    
.wrapper .sidebar ul li:hover a{
  color: #fff;
}
 

.wrapper .main_content{
  width: 100%;
  margin-left: 200px;
}

.wrapper .main_content .header{
  padding: 20px;
  background: #fff;
  color: #717171;
  border-bottom: 1px solid #e0e4e8;
}

.wrapper .main_content .info{
  margin: 20px;
  color: #717171;
  line-height: 25px;
}

.wrapper .main_content .info div{
  margin-bottom: 20px;
} 
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;

}

tr:nth-child(even) {
  background-color: #dddddd;
}  
    </style>
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <h2>Police</h2>
        <ul>
            <!-- <li><a href="policecriminals.php">Criminals</a></li> -->
            <li><a href="home.php">Back</a></li>
        </ul> 
        
    </div>
    <div class="main_content">
        <div class="header">Police</div>  
        <div class="info">
          <form action="policeaddcriminal.php" method="POST">
          <button style="float: right;" class="btn btn-primary">Add</button>
        </form>
        <form action="policedelcriminal.php" method="POST">
         <button style="float: right;margin-right: 10px;" class="btn btn-danger">Delete</button></form>
         <h3>Criminals Details</h3>
          <table>
         <?php
session_start();
include('conn.php');
$puid=$_SESSION['uid'];
$sql = "SELECT  c.puid,cr.crname,c.cname,c.cemail,c.caddress,c.cphone,c.cweight,c.cheight from criminal c ,crime cr where c.puid ='$puid' and c.crid=cr.crid";
$result = $conn-> query($sql);
    if($result-> num_rows > 0)
    {  echo "<tr><th>PUID</th><th>Crime Name</th><th>Name</th><th>Email</th><th>Address</th><th>Phone</th><th>Weight</th><th>Height</th></tr>";
      while ($row = $result-> fetch_assoc()){
      echo "<tr><td>".$row["puid"]."</td><td>".$row["crname"]."</td><td>".$row["cname"]."</td><td>".$row["cemail"]."</td><td>".$row["caddress"]."</td><td>".$row["cphone"]."</td><td>".$row["cweight"]."</td><td>".$row["cheight"]."</td></tr>";
          }
        }
?>
</table>
      </div>
    </div>
</div>

</body>
</html>