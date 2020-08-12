<?php
$page_title = 'E-GraB - Add Course Assignment';
include('session.php');
include("../mysqli_connect.php");
include("header.php");
?>
<main id="register">
        <form action="add_ca.php" method="post" name="form1">
            <h1>Add Course Assignment</h1>
            <ul class="form">
                <li>
                    <label>Course code</label>
                    <input placeholder="Course code" type="text" name="code" maxlength="7">
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
                    <input placeholder="Professor ID" type="text" name="prof_id" maxlength="12">
                </li>
                <br>
                <li>
                    <input type="submit" name="submit" value="Submit">
                    <a href="all_course_ca.php">Cancel</a>
                </li>
            </ul>
        </form>
</main>
<?php
include('footer.php');
