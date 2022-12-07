<?php require_once("header.php"); ?>
 <body class="text-center">
    <h2>Movies Showing</h2>
    
    <div class="row row-cols-1 row-cols-md-6 g-4">
  <?php
$servername = "localhost:3306";
$username = "russtayl_user";
$password = "0w_zeP}]OVy0";
$dbname = "russtayl_vaca";
    
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "Select movieID, Title, Image from Movie";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
    <div class="col">

     <div id="card" class="card" style="width: 15rem; height: 30rem;">
         <img  src=<?=$row["Image"]?> class="card-img-top" alt="...">
  <div  class="card-body">
    <a class="card-title" href="movie-details.php?id=<?=$row["movieID"]?>"><?=$row["Title"]?></a
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
