<?php
$page_title = 'E-GraB - Add Course Assignment';
include('session.php');
$id = $_GET['id'];
include_once('../mysqli_connect.php');
include('header.php');
if(isset($_POST['update'])) {
    $code = $_POST['code'];
    $c_dep = $_POST['c_dep'];
    $prof_id = $_POST['prof_id'];
    $caid = $_POST['CAID'];

    $cd = @mysqli_query($dbc, "SELECT CID 
                                        FROM courses 
                                        WHERE Course_code = '$code'");
    $c = mysqli_fetch_array($cd);
    $p = @mysqli_query($dbc, "SELECT PID
                                          FROM professors
                                          WHERE Professor_ID = '$prof_id'");
    $pid = mysqli_fetch_array($p);

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

    } else if (empty($cd) || empty($p_id)) {

        if (empty($cd)) {
            echo "<p class='error'>Invalid course code! </p><br/>";
        }

        if (empty($p_id)) {
            echo "<p class='error'>Invalid professor id! </p><br/>";
        }
        echo "<br><a id='back' href='all_course_ca.php'>&larr; Back to courses</a>";
    } else {

        $q = "UPDATE course_assignments 
              SET  Course = '$c[CID]', Department = '$c_dep', Professor = '$pid[PID]'
              WHERE CAID = '$caid'";
        $r = @mysqli_query($dbc, $q);

        echo "<p id='data'> Data added successfully.</p>";
        echo "<br/><a id='back' href='all_course_ca.php'>View Result</a>";
    }
}
$id = $_GET['id'];

$q = "SELECT * 
      FROM course_assignments ca
      INNER JOIN courses co 
      ON ca.Course = co.CID
      INNER JOIN professors p 
      ON ca.Professor = p.PID
      WHERE CAID = '$id'";
$r = @mysqli_query($dbc, $q);

while($row = mysqli_fetch_array($r)) {
    $code = $row['Course_code'];
    $prof_id = $row['Professor_ID'];
}
?>
<main id="register">
    <form action="edit_ca.php?=id=<?php echo $id; ?>" method="post" name="form1">
        <h1>Edit Course Assignment</h1>
        <ul class="form">
            <li>
                <label>Course code</label>
                <input placeholder="Course code" type="text" name="code" maxlength="7" value="<?php echo $code; ?>">
            </li>
            <li>
                <label>Department</label>
                <label>
                    <select name="c_dep">
                        <option value="0">-</option>
                        <option value="1">CS</option>
                        <option value="2">ECON</option>
                        <option value="3">PSIR</option>
                        <option value="4">DOFL</option>
                    </select>
                </label>
            </li>
            <li>
                <label>Professor ID</label>
                <input placeholder="Professor ID" type="text" name="prof_id" maxlength="12" value="<?php echo $prof_id; ?>">
            </li>
            <br>
            <li>
                <input type="submit" name="update" value="Update">
                <a href="all_course_ca.php">Cancel</a>
                <input type="hidden" name="CAID" value="<?php echo $id; ?>"/>
            </li>
        </ul>
    </form>
</main>
<?php
include('footer.php');