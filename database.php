<?php
$servername="localhost";
$username="root";
$password="";
$database="your_database";
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn)
{
    die("Erroe deleting record:".mysqli_error($conn));
}
?>