<?php
include('../mysqli_connect.php');

$id = $_GET['id'];

$q = "DELETE FROM course_assignments WHERE CAID = '$id'";
$r = @mysqli_query($dbc, $q);

header("Location: all_course_ca.php");