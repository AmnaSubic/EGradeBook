<?php
$page_title = 'E-GraB - All Students';
include('session.php');
include_once('../mysqli_connect.php');
$q = "SELECT * FROM students s 
      INNER JOIN departments d 
      ON s.Department = d.DID 
      ORDER BY SID ASC";
$r = @mysqli_query($dbc, $q);
include('header.php');
?>

    <a href="add_student.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Student</a><br/><br/>

    <table class="all_info">
        <tr>
            <th>Dep</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Date of birth</th>
            <th>Place of birth</th>
            <th>Mother</th>
            <th>Father</th>
            <th>Address</th>
            <th>Enroll. D.</th>
            <th>Exp. End D.</th>
            <th>Student ID</th>
            <th>Personal email</th>
            <th>School email</th>
            <th>Phone</th>
            <th></th>
        </tr>

        <?php

        while($res = mysqli_fetch_array($r)) {
            echo "<tr>";
            echo "<td>".$res['Dep_abbreviation']."</td>";
            echo "<td>".$res['Fname']."</td>";
            echo "<td>".$res['Lname']."</td>";
            echo "<td>".date("M d, Y", strtotime($res['DOB']))."</td>";
            echo "<td>".$res['Place_of_birth']."</td>";
            echo "<td>".$res['Mother_name']."</td>";
            echo "<td>".$res['Father_name']."</td>";
            echo "<td>".$res['Address'].", ".$res['Zip']." ".$res['City']."</td>";
            echo "<td>".date("M d, Y", strtotime($res['Enrollment_date']))."</td>";
            echo "<td>".date("M d, Y", strtotime($res['Expected_end_date']))."</td>";
            echo "<td>".$res['Student_ID']."</td>";
            echo "<td>".$res['Personal_email']."</td>";
            echo "<td>".$res['School_email']."</td>";
            echo "<td>".$res['Phone']."</td>";
            echo "<td><a href=\"edit_s.php?id=$res[SID]\">EDIT</a> | <a href=\"delete_s.php?id=$res[SID]\" 
                onClick=\"return confirm('Are you sure you want to delete?')\">DELETE</a></td></tr>";
        }

        ?>

    </table>

<?php
include('footer.php');
