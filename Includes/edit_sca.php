<?php
$page_title = 'E-GraB - Add Course Assignment';
include('session.php');
include_once('../mysqli_connect.php');
include('header.php');
if(isset($_POST['update'])) {
    $stu_id = $_POST['stu_id'];
    $enroll = $_POST['enroll'];
    $scid = $_POST['SCID'];


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
            echo "<br><a id='back' href='course_p.php?id=$id'>&larr; Back to course</a>";
        } else {
            $q = "UPDATE enrollments 
                  SET Student = '$sid', Enrollment_date = '$enroll'
                  WHERE EID = '$scid'" ;
            $r = @mysqli_query($dbc, $q);

            echo "<p id='data'>Data added successfully!</p>";
            echo "<br/><a id='back' href='course_p.php?id=$id'>View Result</a>";
        }
    }
}
$id = $_GET['id'];
$q = @mysqli_query($dbc, "SELECT e.Enrollment_date, s.SID, s.Student_ID, e.EID  FROM enrollments e 
                                 INNER JOIN students s 
                                 ON e.Student= s.SID
                                 WHERE e.EID = '$id'");
$r = mysqli_fetch_array($q);
?>

    <div class="register">
        <form action="add_sca.php?id=<?php echo $id; ?>" method="post" name="form1">
            <h1>Edit Student Course Assignment</h1>
            <ul class="form">
                <li>
                    <label>Student ID</label>
                    <input placeholder="Student ID" type="text" name="stu_id"/>
                </li>
                <li>
                    <label>Enrollment date</label>
                    <input type="date" name="enroll"/>
                </li>
                <br>
                <li>
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" name="scid" value="<?php echo $id; ?>">
                    <a href="course_p.php?id=<?php echo $id; ?>">Cancel</a>
                </li>
            </ul>
        </form>
    </div>

<?php
include('footer.php');