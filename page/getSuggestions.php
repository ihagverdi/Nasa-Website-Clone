<?php
include("mysql.php");
$q = $_GET['q'];
$stmt = "SELECT * FROM media WHERE title LIKE '%".$q."%'";
$result = $conn->query($stmt);
echo "<ul>";
$cnt = 0;

while(($row = $result->fetch_assoc()) && $cnt < 5){
    echo "<li> <a href = 'content.php?id=" .$row['id']." '> ".$row['title']." </a> </li>"; 
    $cnt++;
}
echo "</ul>";   
$conn->close();
?>