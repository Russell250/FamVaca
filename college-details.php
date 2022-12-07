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

    
      
  $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

  
  
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
  switch ($_POST['saveType']) {
 case 'Add':
      $sqlAdd = "insert into Ticket (movieID, memberID, foodID, seat, showtime) value (?, ?, ?, ?, ?)";
      $stmtAdd = $conn->prepare($sqlAdd);
    $stmtAdd->bind_param("iiiss", $_POST['mid'], $_POST['meid'], $_POST['fid'], $_POST['Tseat'], $_POST['Tshowtime']);
    $stmtAdd->execute();
      echo '<div class="alert alert-success" role="alert">Ticket Purchased!</div>';
      break;
 
  }
}
    
    
   $mid = $_GET['id'];
  
$sql = "Select movieID, Title, Image, Starring, Director, Duration, Summary from Movie where movieID=" . $mid;
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
