<?php
include('../mysqli_connect.php');

$id = $_GET['id'];

$q = "DELETE FROM students WHERE SID = '$id'";
$r = @mysqli_query($dbc, $q);

header("Location: all_students.php");