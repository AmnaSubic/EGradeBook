<?php
$page_title = 'E-GraB - Add Course Assignment';
include('session.php');
include_once('../mysqli_connect.php');
include('header.php');
if(isset($_POST['submit'])) {
    $code = $_POST['code'];
    $c_dep = $_POST['c_dep'];
    $prof_id = $_POST['prof_id'];

    $c = @mysqli_query($dbc, "SELECT CID 
                                        FROM courses 
                                        WHERE Course_code = '$code'");
    $cd = mysqli_fetch_array($c);
    $pid = @mysqli_query($dbc, "SELECT PID
                                          FROM professors
                                          WHERE Professor_ID = '$prof_id'");
    $p_id = mysqli_fetch_array($pid);

    if(empty($code) || empty($prof_id) || $c_dep === '0') {
        echo "<p id='err'>Errors: </p><br>";
        if(empty($code)) {
            echo "<p class='error'>Course code field is empty </p><br/>";
        }

        if(empty($prof_id)) {
            echo "<p class='error'>Professor id field is empty </p><br/>";
        }

        if($c_dep === '0') {
            echo "<p class='error'>No department selected </p><br/>";
        }
        echo "<br><a id='back' href='all_course_ca.php'>&larr; Back to courses</a>";
    } else if (empty($cd) || empty($p_id)) {

        if (empty($cd)) {
            echo "<p class='error'>Invalid course code! </p><br/>";
        }

        if (empty($p_id)) {
            echo "<p class='error'>Invalid professor id! </p><br/>";
        }
        echo "<br><a id='back' href='all_course_ca.php'>&larr; Back to courses</a>";
    } else {

        $q = "INSERT INTO course_assignments(Course, Department, Professor) 
              VALUES ('$cd[CID]', '$c_dep', '$p_id[PID]')";
        $r = @mysqli_query($dbc, $q);

        echo "<p id='data'> Data added successfully.</p>";
        echo "<br/><a id='back' href='all_course_ca.php'>View Result</a>";
    }
}
include('footer.php');