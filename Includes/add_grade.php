<?php
$page_title = 'E-GraB';
include('session.php');
include('../mysqli_connect.php');
$pid = $_SESSION['PID'];
$id = $_GET['id'];
include('header.php');
if(isset($_POST['submit'])) {
    $stu_id = $_POST['stu_id'];
    $test = $_POST['test'];
    $score = $_POST['score'];
    $max_s = $_POST['max_s'];
    $weight = $_POST['weight'];
    $test_date = $_POST['test_date'];
    $caid = $_POST['caid'];

    if (empty($stu_id) || empty($test) || empty($score) || empty($max_s) || empty($weight) || empty($test_date)) {
        echo "<p id='err'>Errors: </p><br>";

        if (empty($stu_id)) {
            echo "<p class='error'>Student ID field is empty </p><br/>";
        }

        if (empty($date)) {
            echo "<p class='error'>Date field is empty </p><br/>";
        }

        if (empty($test)) {
            echo "<p class='error'>Test name field is empty </p><br/>";
        }

        if (empty($score)) {
            echo "<p class='error'>Test score field is empty </p><br/>";
        }

        if (empty($max_s)) {
            echo "<p class='error'>Max score field is empty </p><br/>";
        }

        if (empty($weight)) {
            echo "<p class='error'>Test weight field is empty </p><br/>";
        }

        if (empty($test_date)) {
            echo "<p class='error'>Test date field is empty </p><br/>";
        }

        echo "<br><a id='back' href='course_p.php?id=$id'>&larr; Back to course</a>";

    } else {
        $s = @mysqli_query($dbc, "SELECT SID FROM students WHERE Student_ID = '$stu_id'");
        $result = mysqli_fetch_array($s);
        $sid = $result['SID'];


        $e = @mysqli_query($dbc, "SELECT EID
                                         FROM enrollments
                                         WHERE Student = '$sid'
                                         AND Course_Assignment = '$caid'
                                         AND YEAR(Enrollment_date) >= YEAR(CURRENT_DATE) - 1");
        $res = mysqli_fetch_array($e);
        $eid = $res['EID'];
        if (empty($eid)) {

            echo "<p class='error'> Invalid Enrollment! </p><br/>";
            echo "<br><a id='back' href='course_p.php?id=$id'>&larr; Back to course</a>";

        } else {
            $q = "INSERT INTO grades(Enrollment, Test_name, Test_score, Max_score, Test_weight, Test_date)
                  VALUES ('$eid', '$test', '$score', '$max_s', '$weight', '$test_date')";
            $r = @mysqli_query($dbc, $q);

            echo "<p id='data'>Data added successfully!</p>";
            echo "<br><a id='back' href='course_p.php?id=$id'>&larr; Back to course</a>";
        }
    }
}
include('footer.php');