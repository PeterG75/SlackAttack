<?php
include 'config.php';
if (isset($_POST["message"]))
{
    $message = $_POST["message"];
}
echo $message;
$con= new mysqli($db_server,$db_user,$db_pass,$db_name);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
    }

$sql = "INSERT INTO messagelog (message)
VALUES ('" . $message . "')";

if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
?>