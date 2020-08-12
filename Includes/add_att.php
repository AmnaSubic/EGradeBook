<?php
$page_title = 'E-GraB';
include('session.php');
include('../mysqli_connect.php');
$id = $_GET['id'];
include('header.php');
if(isset($_POST['submit'])) {
    $stu_id = $_POST['stu_id'];
    $date = $_POST['date'];
    $activity = $_POST['activity'];

    if (empty($stu_id) || empty($date) || !isset($activity)) {
        echo "<p id='err'>Errors: </p><br>";
        if (empty($stu_id)) {
            echo "<p class='error'>Student ID field is empty </p><br/>";
        }

        if (empty($date)) {
            echo "<p class='error'>Date field is empty </p><br/>";
        }

        if (!isset($activity)) {
            echo "<p class='error'>Choose activity!</p><br>";
        }
        echo "<br><a id='back' href='course_p.php?id=$id'>&larr; Back to course</a>";
    } else {
        $s = @mysqli_query($dbc, "SELECT SID FROM students WHERE Student_ID = '$stu_id'");
        $result = mysqli_fetch_array($s);
        $sid = $result['SID'];

        $e = @mysqli_query($dbc, "SELECT EID
                                         FROM enrollments
                                         WHERE Student = '$sid'
                                         AND Course_Assignment = '$id'
                                         AND YEAR(Enrollment_date) >= YEAR(CURRENT_DATE) - 1");

        $res = mysqli_fetch_array($e);
        $eid = $res['EID'];

        if (empty($eid)) {

            echo "Invalid Enrollment! <br/>";

        } else {
            $q = "INSERT INTO attendance (Enrollment, Activity, Date)
                  VALUES ('$eid', '$activity', '$date')";
            $r = @mysqli_query($dbc, $q);

            echo "<p id='data'> Data added successfully.";
            echo "<br><a id='back' href='course_p.php?id=$id'>&larr; Back to course</a>";
        }


    }
}
include('footer.php');