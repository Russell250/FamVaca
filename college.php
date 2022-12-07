<?php require_once("header.php"); ?>
 <body class="text-center">
    <h1 class=" alert alert-danger">Colleges</h1>
    
    <div class="row row-cols-1 row-cols-md-6 g-4">
  <?php
$servername = "localhost";
$username = "russtayl_user";
$password = "RussTaylor2000";
$dbname = "russtayl_vaca";
    
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "Select CollegeID, CollegeName, Logo from colleges";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
    <div class="col">

     <div id="card" class="card" style="width: 15rem; height: 30rem;">
         <img  src=<?=$row["Logo"]?> class="card-img-top" alt="...">
  <div  class="card-body">
    <a class="card-title" href="college-details.php?id=<?=$row["CollegeID"]?>"><?=$row["CollegeName"]?></a
  </div>
      </div>
  </div>
      </div>
<?php
  }
} else {
  echo "0 results";
}
$conn->close();
?>
