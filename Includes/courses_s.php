<?php
$page_title = 'E-GraB';
include('session.php');
$id = $_SESSION['SID'];
require_once('../mysqli_connect.php');
$q = ("SELECT * 
        FROM enrollments e
        INNER JOIN course_assignments ca
        ON e.Course_assignment = ca.CAID
        INNER JOIN courses co
        ON ca.Course = co.CID
        WHERE Student = '$id'");
$r = @mysqli_query($dbc, $q);
include('header.php');
?>
    <table class="courses_list">
        <tr>
            <th>Title</th>
            <th>Code</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($r)) {
            echo "<tr>";
            echo "<td><a href=\"course_s.php?id=$row[Course_assignment]\">".$row['Course_title']."</a></td>";
            echo "<td><a href=\"course_s.php?id=$row[Course_assignment]\">".$row['Course_code']."</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
<?php
include('footer.php');