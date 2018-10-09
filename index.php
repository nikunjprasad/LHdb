<!DOCTYPE html>
<head>
<title>Home</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/indexstyle.css">

</head>

<body>


<div id="background"></div>

<div class="content">
<a href="login.php" id="link">
<button type="button">Login</button>
</a>
</br>
<button type="button" value="click" onclick="displayform()">Know my status</button>

<?php
function st(){
$servername = "localhost";
$user = "root";
$pass = "password";
$dbname="LHdb";

$conn = new mysqli($servername,$user,$pass,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$rollno=$_POST["rollno"];
$sql= "SELECT Status
       FROM St_Status
       WHERE Student_RollNo='$rollno'";
$result = $conn->query($sql);
if($result->num_rows > 0)
  { 
	
    while($row=$result->fetch_assoc()) 
      {
	
	if($row["Status"]=='1')
	{
		echo '<script> alert("You are signed in'.(string)$row['Warnings'].'")</script>';
	}
        else
        	echo '<script> alert("You are Signed Out")</script>';
          //echo "Number of Warnings:  ";
          //echo $row["Warning"];
     }
  
  }
else
	echo '<script> alert("Invalid Roll number!!")</script>';
$conn->close();

}
if(isset($_POST['submit']))
{
   st();
} 
?> 

<div id="status">
<form action="work.php" method="POST">
<input type="text" name="rollno" placeholder="Type your roll number">
<input type="submit" value="Submit" name="submit">
</form>
</div>
</div>


<script type="text/javascript">
function displayform() {
    document.getElementById("status").style.display="block";
}
function getstatus() {
 alert("me");
}



</script>
</body>
</html>
