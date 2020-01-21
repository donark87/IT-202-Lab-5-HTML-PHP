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
$pwd = $_GET['password'];
    
$sql = "SELECT `Name`,`Password` FROM `Chat` WHERE `Name` = '$name'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);



if($row["Name"] != $name)
{
    echo "The name/password is invalid!";
}
else if ($row["Password"] != $pwd)
{
    echo "The name/password is invalid!";
}
else {
    echo "You are logged in!";
}

?>