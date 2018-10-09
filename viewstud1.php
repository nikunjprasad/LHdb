<!DOCTYPE html>
<html lang="en">
<head>
    
  <title>Warden</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/2C6C420E-90CE-A447-AA49-E4075F026DCE/main.js" charset="UTF-8"></script><link rel="stylesheet" crossorigin="anonymous" href="https://gc.kis.v2.scr.kaspersky-labs.com/ECD620F5704E-94AA-744A-EC09-E024C6C2/abn/main.css"/><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <style>
        .nav{
            font-size: 18px !important;
            margin-top: 10px !important;
        }
        
        .container{
            z-index:1;
            left:0;
            line-height:80 px;
            margin: auto;
            margin-top:-100 px;
            position: absolute;
            top:50%;
            width: 100%;
            font-size: 40px;
        }
        body{
            text-align: center;
            z-index: 0;
        }
        
        table {
    font-family: arial, sans-serif;
    margin-top:5%;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
    </style>
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <!--<div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div> -->
    <ul class="nav navbar-nav">
      <!-- <li class="active"><a href="#">Home</a></li> -->
      <li><a href="warden.html"><span class="glyphicon glyphicon-home"></span><b> Home</b></a></li>                <!--change this to security.html -->
      
       <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Add
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="addstudent.html">Student</a></li>
          <li><a href="addsecurity.html">Security</a></li>
            
        </ul>
      </li>
        
        
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Modify
        <span class="caret"></span></a>
    
        <ul class="dropdown-menu">
          <li><a href="#">Student</a></li>
          <li><a href="#">Security</a></li>
            
        </ul>
   
      </li>
      
        
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" style="color: white" href="#"><b>View</b>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="viewstud1.php"><b>Student</b></a></li>
          <li><a href="viewsecurity.php">Security</a></li>
            <li><a href="viewwarden.php">Warden</a></li>
        </ul>
      </li>
        
       
        
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Student Status
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="wnormalreg.php">Normal Register</a></li>
          <li><a href="wlatereg.php">Late Register</a></li>
          
        </ul>
      </li>
       
    </ul>

	

    <ul class="nav navbar-nav navbar-right">
        <li><form action="write.php" method="POST" enctype="multipart/form-data">
          <input name="Search" placeholder="Search" type="text" /> </form></li> 
	<li class="navbar-text"><span class="glyphicon glyphicon-user"></span> xxxx</li>
      <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>


<?php
$servername = "localhost";
$user = "root";
$pass = "password";
$dbname="LHdb";

$conn = new mysqli($servername,$user,$pass,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Student"; 
$result = $conn->query($sql);
if($result->num_rows > 0)
{
        echo "<table>"; 
        echo "<tr><th>Roll No</th><th>Name</th><th>Room No</th><th>Block No</th><th>Phone No</th><th>Home Address</th><th>Parent's No</th></tr>";
        while($row=$result->fetch_assoc())
        {  
                echo "<tr><td>" . $row['RollNo'] . "</td><td>" . $row['Name'] . "</td><td>". $row['RoomNo'] . "</td><td>". $row['BlockNo'] . "</td><td>". $row['PhoneNo'] . "</td><td>". $row['HomeAddr'] . "</td><td>". $row['ParentsNo'] . "</td></tr>";  
        }
        echo "</table>"; 
}
else
        echo "nothing";


$conn->close();
?>
</body>

</html>
