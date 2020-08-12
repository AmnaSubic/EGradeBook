<?php
include('../mysqli_connect.php');

$id = $_GET['id'];

$q = "DELETE FROM professors WHERE PID = '$id'";
$r = @mysqli_query($dbc, $q);

header("Location: all_professors.php");