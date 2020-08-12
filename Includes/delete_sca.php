<?php
include('../mysqli_connect.php');

$id = $_GET['id'];

$q = "DELETE FROM enrollments WHERE EID = '$id'";
$r = @mysqli_query($dbc, $q);

header("Location: course_p.php?id=$id");