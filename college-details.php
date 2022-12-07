<?php require_once("header.php"); ?>


  <body>
      
<table class="table table-striped">
  <thead>
   
    <tr>
            <th> College Name</th>
            <th> College Location </th>
            <th> Conference </th>
                  <th> College Description</th>
    
    </tr>
  </thead>
  
  <?php
  $servername = "localhost";
$username = "russtayl_user";
$password = "RussTaylor2000";
$dbname = "russtayl_sample";
     
  $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

    
    
   $mid = $_GET['id'];
  
$sql = "Select CollegeID, Logo, CollegeName, CollegeLocation, Conference, CollegeDesc from colleges where CollegeID=" . $mid;
  echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>

  <div class="text-center">
  <img src=<?=$row["Logo"]?> style="height: 30vw;" class="rounded">
</div>
   <tbody>
    
      <tr>
    <td><?=$row["CollegeName"]?></td>
    <td><?=$row["CollegeLocation"]?></td>
       <td><?=$row["Conference"]?></td>
        <td><?=$row["CollegeDesc"]?></td>
                


    </tr>   
                     
                     
                     
                     

<?php
  }
} else {
  echo "0 results";
}
  

?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
