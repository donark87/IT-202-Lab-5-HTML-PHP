<?php

$servername = "sql2.njit.edu";    //sql2.njit.edu:3306 AFS
$database = "dp663";
$username = "dp663";
$password = "rlxqcbSd";


// Create connection

$conn = new mysqli($servername, $username, $password, $database);

// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
<?php
$q = $_GET['q'];
$name = $_GET['name'];

$sql = "UPDATE Chat SET `Message` = '$q' WHERE `Name` = '$name'";
mysqli_query($conn, $sql);
echo "Message delivered.";


?>