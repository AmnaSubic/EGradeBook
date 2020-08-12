<?php
$page_title = 'E-GraB - All Professors';
include('session.php');
include_once('../mysqli_connect.php');
$q = "SELECT * 
      FROM professors p 
      INNER JOIN departments d 
      ON p.Department = d.DID
      WHERE Admin = '0' 
      ORDER BY PID ASC";
$r = @mysqli_query($dbc, $q);
include('header.php');
?>

<a href="add_professor.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Professor</a><br/><br/>

<table class="all_info">
    <tr>
        <th>Dep</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Date of birth</th>
        <th>Place of birth</th>
        <th>Address</th>
        <th>CSD</th>
        <th>CED</th>
        <th>Professor ID</th>
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
    echo "<td>".$res['Address'].", ".$res['Zip']." ".$res['City']."</td>";
    echo "<td>".date("M d, Y", strtotime($res['Contract_start_date']))."</td>";
    echo "<td>".date("M d, Y", strtotime($res['Contract_end_date']))."</td>";
    echo "<td>".$res['Professor_ID']."</td>";
    echo "<td>".$res['Personal_email']."</td>";
    echo "<td>".$res['School_email']."</td>";
    echo "<td>".$res['Phone']."</td>";
    echo "<td><a href=\"edit_p.php?id=$res[PID]\">EDIT</a> | <a href=\"delete_p.php?id=$res[PID]\" 
                onClick=\"return confirm('Are you sure you want to delete?')\">DELETE</a></td></tr>";
}

?>

</table>

<?php
include('footer.php');
