<?php
$page_title = 'E-GraB - Add Student Course Assignment';
include('session.php');
$id = $_GET['id'];
include_once('../mysqli_connect.php');
include('header.php');
if(isset($_POST['submit'])) {
    $stu_id = $_POST['stu_id'];
    $enroll = $_POST['enroll'];
    $w = $_POST['id'];

    if(empty($stu_id) || empty($enroll)) {
        echo "<p id='err'>Errors: </p><br>";
        if(empty($stu_id)) {
            echo "<p class='error'>Student ID field is empty </p><br/>";
        }

        if(empty($enroll)) {
            echo "<p class='error'>Enrollment date field is empty</p><br/>";
        }
        echo "<br><a id='back' href='course_p.php?id=$id'>&larr; Back to course</a>";
    }  else {
        $s = @mysqli_query($dbc, "SELECT SID 
                                        FROM students 
                                        WHERE Student_ID = '$stu_id'");
        $res = mysqli_fetch_array($s);
        $sid = $res['SID'];

        if (empty($sid)) {
            echo "<p class='error'>Invalid student ID!</p><br/>";
            echo "<br><a id='back' href='course_p.php'>&larr; Back to course</a>";
        } else {
            $q = "INSERT INTO enrollments(Student, Course_assignment, Enrollment_date) 
                  VALUES ('$sid', '$id', '$enroll')";
            $r = @mysqli_query($dbc, $q);

            echo "<p id='data'>Data added successfully!</p>";
            echo "<br/><a id='back' href='course_p.php?id=$w'>View Result</a>";
        }
    }
}
include('footer.php');