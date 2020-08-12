<?php
$page_title = 'E-GraB';
include('session.php');
$id = $_SESSION['SID'];
require_once('../mysqli_connect.php');
$q = ("SELECT * 
        FROM students s
        INNER JOIN departments d
        ON s.Department = d.DID
        WHERE SID = '$id'");
$r = @mysqli_query($dbc,$q);
while ($row = mysqli_fetch_array($r))
{
    $fname = $row['Fname'];
    $lname = $row['Lname'];
    $dob = $row['DOB'];
    $place_of_birth = $row['Place_of_birth'];
    $phone = $row['Phone'];
    $address = $row['Address'];
    $city = $row['City'];
    $zip = $row['Zip'];
    $personal_email = $row['Personal_email'];
    $school_email = $row['School_email'];
    $student_id = $row['Student_ID'];
    $enrollment_date = $row['Enrollment_date'];
    $expected_end_date = $row['Expected_end_date'];
    $image = $row['Image'];
    $did = $row['Department'];
    $mother = $row['Mother_name'];
    $father = $row['Father_name'];
    $department = $row['Dep_name'];
}
include('header.php');
?>
<div id="page-profile">
    <div class="profile-header">
        <img id="profile-photo" src="Images/student.png" alt="Profile Photo">
        <div class="container-header">
            <div class="container">
                <h1><?php echo "$fname $lname"; ?></h1>
                <p id="student-year">Student</p>
            </div>
            <div class="clear"></div>
            <div class="container">
                <div class="contact-info">
                    <p>
                        <i class="fa fa-envelope-o fa-lg" aria-hidden="true"></i>&nbsp;<?php echo $personal_email; ?>
                    </p>
                    <p>
                        <i class="fa fa-envelope fa-lg" aria-hidden="true"></i>&nbsp;<?php echo $school_email; ?>
                    </p>
                </div>
                <div class="contact-info">
                    <p>
                        <i class="fa fa-mobile" aria-hidden="true"></i>&nbsp;+ <?php echo $phone; ?>
                    </p>
                    <p>
                        <i class="fa fa-home" aria-hidden="true"></i>&nbsp;<?php echo $address; ?>,&nbsp;
                                                                        <?php echo $zip; ?>&nbsp;
                                                                        <?php echo $city; ?>
                    </p>
                </div>
                <div class="contact-info">
                    <p id="ID-number"><?php echo $student_id; ?></p>
                    <p id="ID"> Student ID number</p>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <main>
        <div class="info">
            <h1>Student Data</h1>
            <div class="clear"></div>
            <div class="section">
                <table>
                    <tr>
                        <th>Date of Birth:</th>
                        <td><?php echo date("M d, Y", strtotime($dob)); ?></td>
                    </tr>
                    <tr>
                        <th>Place of Birth:</th>
                        <td><?php echo $place_of_birth; ?></td>
                    </tr>
                    <tr>
                        <th>Father's Name:</th>
                        <td><?php echo $father; ?></td>
                    </tr>
                    <tr>
                        <th>Mother's Name:</th>
                        <td><?php echo $mother; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="info">
            <h1>Enrollments</h1>
            <div class="clear"></div>
            <div class="section">
                <table>
                    <tr>
                        <th>Student ID Number:</th>
                        <td><?php echo $student_id; ?></td>
                    </tr>
                    <tr>
                        <th>Department:</th>
                        <td><?php echo $department; ?></td>
                    </tr>
                    <tr>
                        <th>Academic Year:</th>
                        <td><?php echo date("Y", strtotime($enrollment_date)); ?>/<?php echo date("Y", strtotime("+1 year", strtotime($enrollment_date))); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Enrollment Date:</th>
                        <td><?php echo date("M d, Y", strtotime($enrollment_date)); ?></td>
                    </tr>
                    <tr>
                        <th>Expected End Date:</th>
                        <td><?php echo date ("M d, Y", strtotime($expected_end_date)); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
</div>

<?php
include('footer.php');