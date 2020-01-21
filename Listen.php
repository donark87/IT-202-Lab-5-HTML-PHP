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

$name = $_GET['name'];

$sql = "SELECT `Message` FROM `Chat` WHERE `Name` = '$name'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)==0)
{
    echo "Name not found, Please, enter the correct user name";
}
else {
    while($row = mysqli_fetch_array($result)){
    echo "{$row["Message"]}";
    }
}


?>