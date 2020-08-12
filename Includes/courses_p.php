<?php
$page_title = 'E-GraB';
include('session.php');
$id = $_SESSION['PID'];
require_once('../mysqli_connect.php');
$q = ("SELECT * 
        FROM course_assignments ca
        INNER JOIN courses c
        ON ca.Course = c.CID
        WHERE Professor = '$id'");
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
            echo "<td><a href=\"course_p.php?id=$row[CAID]\">".$row['Course_title']."</a></td>";
            echo "<td><a href=\"course_p.php?id=$row[CAID]\">".$row['Course_code']."</a></td></tr>";
        }
        ?>
    </table>
<?php
include('footer.php');