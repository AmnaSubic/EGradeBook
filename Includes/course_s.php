<?php
$page_title = 'E-GraB';
include('session.php');
$id = $_SESSION['SID'];
$course_id = $_GET['id'];
require_once('../mysqli_connect.php');
$q = "SELECT * FROM enrollments e
      INNER JOIN course_assignments ca 
      ON e.Course_assignment = ca.CAID
      INNER JOIN courses co
      ON ca.Course = co.CID
      INNER JOIN professors p 
      ON ca.Professor  = p.PID
      WHERE Student = '$id'
      AND Course_assignment = '$course_id'";
$r = @mysqli_query($dbc, $q);

$row = mysqli_fetch_array($r);
include('header.php');
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
                <a href="javascript:void(0)" onclick="openTab(event,'Attendance');">
                    <div class="tab-width tablink tab-bottombar tab-hover tab-padding">Attendance</div>
                </a>
                <a href="javascript:void(0)" onclick="openTab(event,'Grades');">
                    <div class="tab-width tablink tab-bottombar tab-hover tab-padding">Grades</div>
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
                        <th>Enrollment date: </th>
                        <td><?php echo $row['Enrollment_date']; ?></td>
                    </tr>
                    <tr>
                        <th>Professor: </th>
                        <td><?php echo $row['Fname']; ?>&nbsp;<?php echo $row['Lname']; ?></td>
                    </tr>
                    <tr>
                        <th>Professor_email: </th>
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
                    </tr>
                    <?php
                    $s = "SELECT * FROM enrollments e
                          INNER JOIN  course_assignments ca
                          ON e.Course_assignment = ca.CAID
                          INNER JOIN students s 
                          ON e.Student = s.SID
                          WHERE Course_assignment = '$course_id'
                          AND e.Enrollment_date = '$row[Enrollment_date]'";
                    $students = @mysqli_query($dbc,$s);
                    while($stu = mysqli_fetch_array($students))
                    {
                        echo "<tr>";
                        echo "<td>".$stu['Student_ID']."</td>";
                        echo "<td>".$stu['Fname']." ".$stu['Lname']."</td></tr>";
                    }
                    ?>
                </table>
            </div>
            <div id="Attendance" class="page tab" style="display: none">
                <span onclick="this.parentElement.style.display='none'" class="tab-button tab-display-topright">X</span>
                <table class="course">
                    <tr>
                        <th>Date</th>
                        <th>Activity</th>
                    </tr>
                    <?php
                    $att = @mysqli_query($dbc, "SELECT * FROM attendance a 
                                                      INNER JOIN enrollments e 
                                                      ON a.Enrollment = e.EID
                                                      INNER JOIN students s
                                                      ON e.Student = s.SID
                                                      WHERE e.Student = '$id'
                                                      AND Enrollment = '$row[EID]'");
                    while($result = mysqli_fetch_array($att))
                    {
                        echo "<tr>";
                        echo "<td>".$result['Date']."</td>";
                        if($result['Activity'] === '1') {
                            echo "<td> + </td></tr>";
                        } else echo "<td> - </td></tr>";
                    }
                    ?>
                </table>
            </div>
            <div id="Grades" class="page tab" style="display: none">
                <span onclick="this.parentElement.style.display='none'" class="tab-button tab-display-topright">X</span>
                <table class="course">
                    <tr>
                        <th>Name</th>
                        <th>Score</th>
                        <th>Pecentage</th>
                        <th>Weight</th>
                        <th>Date</th>
                    </tr>
                    <?php
                    $ps = 0;
                    $ws = 0;
                    $gra = @mysqli_query($dbc, "SELECT * FROM grades g
                                                      INNER JOIN enrollments e 
                                                      ON g.Enrollment = e.EID
                                                      WHERE e.Student = '$id'
                                                      AND Enrollment = '$row[EID]'");
                        while ($res = mysqli_fetch_array(($gra)))
                        {
                            $test_score = $res['Test_score'];
                            $max = $res['Max_score'];
                            $weight = $res['Test_weight'];
                            $percent = $test_score / $max * 100;
                            $ps = $ps + $percent * $res['Test_weight'] / 100;
                            $ws = $ws + $weight;

                            echo "<tr>";
                            echo "<td>".$res['Test_name']."</td>";
                            echo "<td>".$test_score."/".$max."</td>";
                            echo "<td>".$percent."%</td>";
                            echo "<td>".$weight."%</td>";
                            echo "<td>".date("d.m.Y",strtotime($res['Test_date']))."</td>";
                        }
                    $meter = $ps/$ws*100;
                    if ($meter < 51) {
                        $color = 'red';
                    } else if ($meter >= 51 && $meter < 71) {
                        $color = 'yellow';
                    } else if ($meter >= 71 && $meter < 91) {
                        $color = 'light_green';
                    } else {
                        $color = 'green';
                    }
                    ?>
                </table>
                <br>
                <div class="progress">
                    <div class="<?php echo $color;?>" style="width:<?php echo $meter;?>%"><?php echo $meter; ?>%</div>
                </div>
            </div>
        </div>
    </div>

<?php
include('footer.php');