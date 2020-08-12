<?php
session_start();
include('../mysqli_connect.php');

$user_check = $_SESSION['login_user'];

$ses_sql = mysqli_query($dbc, "SELECT School_email FROM professors WHERE School_email = '$user_check'");
$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_session = $row['School_email'];

$s_sql = mysqli_query($dbc, "SELECT School_email FROM students WHERE School_email = '$user_check'");
$r = mysqli_fetch_array($s_sql, MYSQLI_ASSOC);
$login_session = $r['School_email'];


if(!isset($_SESSION['login_user']))
{
    header("location: login_page.php");
}