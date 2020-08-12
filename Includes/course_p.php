<?php
$page_title = 'E-GraB';
include('session.php');
$id = $_SESSION['PID'];
$course_id = $_GET['id'];
require_once('../mysqli_connect.php');
$q = "SELECT * FROM course_assignments ca
      INNER JOIN courses co
      ON ca.Course = co.CID
      INNER JOIN professors p 
      ON ca.Professor  = p.PID
      WHERE Professor = '$id'
      AND CAID = '$course_id'";
$r = @mysqli_query($dbc, $q);

$row = mysqli_fetch_array($r);
include('header.php');
echo "<a href=\"add_student_ca.php?id=$row[CAID]\"><i class=\"fa fa-user-plus\" aria-hidden=\"true\"></i> Add Student</a><br/><br/>"
?>
    <div class="info tabs">
        <h1>Courses</h1>
        <div class="clear"></div>
        <div class="section">
            <div class="tab-row">
                <a href="javascript:void(0)" onclick="openTab(event,'Course info');">
                    <div class="tab-width tablink tab-bottombar tab-hover tab-padding">Course info</div>
                </a>
                <a href="javascript:void(0)" onclick="openTab(event,'Students');">
                    <div class="tab-width tablink tab-bottombar tab-hover tab-padding">Students</div>
                </a>
                <a href="javascript:void(0)" onclick="openTab(event,'Add attendance');">
                    <div class="tab-width tablink tab-bottombar tab-hover tab-padding">Add attendance</div>
                </a>
                <a href="javascript:void(0)" onclick="openTab(event,'Add grades');">
                    <div class="tab-width tablink tab-bottombar tab-hover tab-padding">Add grades</div>
                </a>
            </div>
            <div id="Course info" class="page tab" style="display: none">
                <span onclick="this.parentElement.style.display='none'" class="tab-button tab-display-topright tab-large">X</span>
                <table>
                    <tr>
                        <th>Course title: </th>
                        <td><?php echo $row['Course_title']; ?></td>
                    </tr>
                    <tr>
                        <th>Course code: </th>
                        <td><?php echo $row['Course_code']; ?></td>
                    </tr>
                    <tr>
                        <th>Course credit: </th>
                        <td><?php echo $row['Course_credit']; ?></td>
                    </tr>
                    <tr>
                        <th>Professor: </th>
                        <td><?php echo $row['Fname']; ?>&nbsp;<?php echo $row['Lname']; ?></td>
                    </tr>
                    <tr>
                        <th>Email: </th>
                        <td><?php echo $row['School_email']; ?></td>
                    </tr>
                </table>
            </div>
            <div id="Students" class="page tab" style="display: none">
                <span onclick="this.parentElement.style.display='none'" class="tab-button tab-display-topright">X</span>
                <table class="course">
                    <tr>
                        <th>Student ID</th>
                        <th>Student name</th>
                        <th></th>
                    </tr>
                <?php
                $s = "SELECT *
                      FROM enrollments e
                      INNER JOIN students s 
                      ON e.Student = s.SID
                      WHERE e.Course_assignment = '$course_id'
                      AND YEAR(e.Enrollment_date) >= YEAR(CURRENT_DATE) - 1
                      ORDER BY s.Lname, s.Fname";
                    $students = @mysqli_query($dbc,$s);
                    while($stu = mysqli_fetch_array($students))
                    {
                        echo "<tr>";
                        echo "<td>".$stu['Student_ID']."</td>";
                        echo "<td>".$stu['Fname']." ".$stu['Lname']."</td>";
                        echo "<td><a href=\"edit_sca.php?id=$stu[EID]\">EDIT</a> | <a href=\"delete_sca.php?id=$stu[EID]\" 
                onClick=\"return confirm('Are you sure you want to delete?')\">DELETE</a></td></tr>";
                    }
                ?>
                </table>
            </div>
            <div id="Add attendance" class="page tab" style="display: none">
                <span onclick="this.parentElement.style.display='none'" class="tab-button tab-display-topright">X</span>
                <form action="add_att.php?id=<?php echo $course_id; ?>" method="post" name="form1">
                    <h1>Add Attendance</h1>
                    <br>
                    <ul class="form">
                        <br>
                        <li>
                            <input placeholder="Student ID" maxlength="12" type="text" name="stu_id"/>
                        </li>
                        <li>
                            <label>Date</label>
                            <label>
                                <input type="date" name="date"/>
                            </label>
                        </li>
                        <li>
                            <label>Activity</label>
                            <label for="activity">
                                <input type="radio" name="activity" value="0"> -
                                <input type="radio" name="activity" value="1"> +
                            </label>
                        </li>
                        <br>
                        <li>
                            <input type="submit" name="submit" value="submit">
                            <a href="course_p.php?id=<?php echo $id; ?>">Cancel</a>
                        </li>
                    </ul>
                </form>
            </div>
            <div id="Add grades" class="page tab" style="display: none">
                <span onclick="this.parentElement.style.display='none'" class="tab-button tab-display-topright">X</span>
                <h1>Add Grade</h1>
                <br>
                <form action="add_grade.php?id=<?php echo $course_id; ?>" method="post" name="form1">
                    <ul class="form">
                        <br>
                        <li>
                            <input placeholder="Student ID" type="text" maxlength="12" name="stu_id"/>
                        </li>
                        <li>
                            <h2>Test Info</h2>
                            <label>
                                <input placeholder="Test name" type="text" maxlength="50" name="test">
                                <input type="date" name="test_date">
                            </label>
                        </li>
                        <li>
                            <input placeholder="Points scored" min="0" max="100" maxlength="3" type="number" name="score">
                            <input placeholder="Max test score" min="0" max="100" maxlength="3" type="number" name="max_s">
                            <input placeholder="Test weight" min="1" max="50" maxlength="2" type="number" name="weight">
                        </li>
                        <br>
                        <li>
                            <input type="hidden" name="caid" value="<?php echo $course_id;?>">
                            <input type="submit" name="submit" value="submit">
                            <a href="course_p.php?id=<?php echo $id; ?>">Cancel</a>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
<?php
include('footer.php');