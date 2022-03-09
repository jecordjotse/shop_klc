<?php
$host = "localhost";
$pword = "bionicAdmin_123";
$dbname = "klc";
$uname = "bionicAdmin";

// Create connection
$con = new mysqli( $host , $uname , $pword , $dbname );

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
