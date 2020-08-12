<?php
$page_title = 'E-GraB - All Course Assignments';
include('session.php');
include_once('../mysqli_connect.php');
$q = "SELECT * FROM course_assignments ca 
      INNER JOIN departments d 
      ON ca.Department = d.DID 
      INNER JOIN courses co
      ON ca.Course = co.CID
      INNER JOIN professors p
      ON ca.Professor = p.PID
      ORDER BY CAID ASC";
$r = @mysqli_query($dbc, $q);
include('header.php');
?>

    <a href="add_course_a.php"><i class="fa fa-book" aria-hidden="true"></i> Add Course Assignment</a><br/><br/>

    <table class="all_info">
        <tr>
            <th>Course code</th>
            <th>Course name</th>
            <th>Department</th>
            <th>Professor name</th>
            <th></th>
        </tr>

        <?php
        while($res = mysqli_fetch_array($r)) {
            echo "<tr>";
            echo "<td>".$res['Course_code']."</td>";
            echo "<td>".$res['Course_title']."</td>";
            echo "<td>".$res['Dep_name']."</td>";
            echo "<td>".$res['Fname']." ".$res['Lname']."</td>";
            echo "<td><a href=\"edit_ca.php?id=$res[CAID]\">EDIT</a> | <a href=\"delete_ca.php?id=$res[CAID]\" 
                onClick=\"return confirm('Are you sure you want to delete?')\">DELETE</a></td></tr>";
        }
        ?>

    </table>

<?php
include('footer.php');
