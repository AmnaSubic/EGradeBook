<?php
session_start();
$page_title = 'E-GraB';
include('session.php');
$user_id = $_SESSION['PID'];
require_once('../mysqli_connect.php');
$q = ("SELECT * 
        FROM professors p
        INNER JOIN departments d 
        ON p.Department = d.DID
        WHERE PID = '$user_id'");
$r = @mysqli_query($dbc,$q);
while ($row = mysqli_fetch_array($r))
{
    $p_fname = $row['Fname'];
    $p_lname = $row['Lname'];
    $p_dob = $row['DOB'];
    $p_place_of_birth = $row['Place_of_birth'];
    $p_phone = $row['Phone'];
    $p_address = $row['Address'];
    $p_city = $row['City'];
    $p_zip = $row['Zip'];
    $p_personal_email = $row['Personal_email'];
    $p_school_email = $row['School_email'];
    $professor_id = $row['Professor_ID'];
    $contract_start_date = $row['Contract_start_date'];
    $contract_end_date = $row['Contract_end_date'];
    $did = $row['Department'];
    $gender = $row['Gender'];
    $p_department = $row['Dep_name'];
}
include('header.php');
?>
<div id="page-profile">
    <div class="profile-header">
        <?php
        if ($gender === '1') {
            echo "<img id=\"profile-photo\" src=\"Images/journalist.png\" alt=\"Profile Photo\">";
        } else echo "<img id=\"profile-photo\" src=\"Images/teacher.png\" alt=\"Profile Photo\">";
        ?>
        <div class="container-header">
            <div class="container">
                <h1><?php echo "$p_fname $p_lname"; ?></h1>
                <p id="student-year">Professor</p>
            </div>
            <div class="container">
                <div class="contact-info">
                    <p>
                        <i class="fa fa-envelope-o fa-lg" aria-hidden="true"></i>&nbsp;<?php echo $p_school_email; ?>
                    </p>
                    <p>
                        <i class="fa fa-envelope fa-lg" aria-hidden="true"></i>&nbsp;<?php echo $p_personal_email; ?>
                    </p>
                </div>
                <div class="contact-info">
                    <p>
                        <i class="fa fa-mobile" aria-hidden="true"></i>&nbsp;<?php echo $p_phone; ?>
                    </p>
                    <p>
                        <i class="fa fa-home" aria-hidden="true"></i>&nbsp;<?php echo $p_address; ?>,&nbsp;
                                                                        <?php echo $p_zip; ?>&nbsp;
                                                                        <?php echo $p_city; ?>
                    </p>
                </div>
                <div class="contact-info">
                    <p id="ID-number"><?php echo $professor_id; ?></p>
                    <p id="ID"> Professor ID number</p>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <main>
        <div class="info">
            <h1>Professor Data</h1>
            <div class="clear"></div>
            <div class="section">
                <table>
                    <tr>
                        <th>Date of Birth:</th>
                        <td><?php echo date("M d, Y", strtotime($p_dob)); ?></td>
                    </tr>
                    <tr>
                        <th>Place of Birth:</th>
                        <td><?php echo $p_place_of_birth; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="info">
            <h1>Employment</h1>
            <div class="clear"></div>
            <div class="section">
                <table>
                    <tr>
                        <th>Faculty:</th>
                        <td><?php echo $p_department; ?></td>
                    </tr>
                    <tr>
                        <th>Professor ID Number:</th>
                        <td><?php echo $professor_id; ?></td>
                    </tr>
                    <tr>
                        <th>Contract Start Date:</th>
                        <td><?php echo date("M d, Y", strtotime($contract_start_date)); ?></td>
                    </tr>
                    <tr>
                        <th>Contract End Date:</th>
                        <td><?php echo date("M d, Y", strtotime($contract_end_date)); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
    <div class="clear"></div>
</div>

<?php
include('footer.php');