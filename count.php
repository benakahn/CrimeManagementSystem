<?php
session_start();
// if(!isset(($_SESSION['username']))){
//   header("Location:index.php");
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Panel</title>
   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
     <link rel = "icon" href = "images/pic5.jpg" type = "image/x-icon">
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
   background-color: #f3f5f9;
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
    </style>
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <h2>Admin</h2>
        <ul>
            <li><a href="admincriminals.php">Criminals </a></li>
            <li><a href="adminpolice.php">Police</a></li>
             <li><a href="admincrime.php">Crime</a></li>
             <li><a href="admincourts.php">Courts</a></li>
             <li><a href="count.php">Police Count</a></li>
            <li><a href="newlogreg.php">Logout</a></li>
        </ul> 
        
    </div>
    <div class="main_content">
        <div class="header">Admin</div>  
        <div class="info">
         <h3>Total Police</h3>
                   <table>
         <?php

include('conn.php');

$sql = "CALL `Police_Count`()";
    $result = $conn-> query($sql);
    if($result-> num_rows > 0 )
    {
      while ($row = $result-> fetch_assoc())
      {
        echo "<tr><th>Count </th></tr><tr><td>" .$row["count(*)"] ."</td></tr>";
      }
    }
    $conn-> close();
?>
</table>
      </div>
    </div>
</div>

</body>
</html>