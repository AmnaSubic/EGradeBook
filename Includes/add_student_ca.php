<?php
$page_title = 'E-GraB - Add Student Course Assignment';
include('session.php');
$id = $_GET['id'];
include("../mysqli_connect.php");
include("header.php");
?>
    <div class="register">
            <form action="add_sca.php?id=<?php echo $id; ?>" method="post" name="form1">
                <h1>Add Student Course Assignment</h1>
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
                        <input type="submit" name="submit" value="submit">
                        <a href="course_p.php?id=<?php echo $id; ?>">Cancel</a>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                    </li>
                </ul>
            </form>
    </div>
<?php
include('footer.php');