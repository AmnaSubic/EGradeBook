<?php
$page_title = 'E-GraB - Add Student';
include('session.php');
include_once('../mysqli_connect.php');
include('header.php');

if(isset($_POST['submit'])) {
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $dob = $_POST['dob'];
    $pob = $_POST['pob'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $s_id = $_POST['s_id'];
    $s_p_email = $_POST['s_p_email'];
    $s_s_email = $_POST['s_s_email'];
    $phone = $_POST['phone'];
    $ed = $_POST['ed'];
    $eed = $_POST['eed'];
    $pass = $_POST['pass'];
    $conf_pass = $_POST['conf_pass'];
    $dep = $_POST['dep'];
    $mother = $_POST['mother'];
    $father = $_POST['father'];

    if(empty($fname) || empty($lname) || empty($dob) || empty($pob) || empty($address) || empty($city) ||
        empty($zip) || empty($s_id) || empty($s_p_email) || empty($s_s_email) || empty($phone) ||
        empty($ed) || empty($eed) || empty($pass) || empty($conf_pass) || empty($mother)  ||
        empty($father) || $dep === '0') {
        echo "<p id='err'>Errors: </p><br>";
        if(empty($fname)) {
            echo "<p class='error'>First name field is empty </p><br/>";
        }

        if(empty($lname)) {
            echo "<p class='error'>Last name field is empty </p><br/>";
        }

        if(empty($dob)) {
            echo "<p class='error'>Date of birth field is empty </p><br/>";
        }

        if(empty($pob)) {
            echo "<p class='error'>Place of birth field is empty </p><br/>";
        }

        if(empty($mother)) {
            echo "<p class='error'>Mother name field is empty </p><br/>";
        }

        if(empty($father)) {
            echo "<p class='error'>Father name field is empty </p><br/>";
        }

        if(empty($address)) {
            echo "<p class='error'>Address field is empty </p><br/>";
        }

        if(empty($city)) {
            echo "<p class='error'>City field is empty </p><br/>";
        }

        if(empty($zip)) {
            echo "<p class='error'>Zip field is empty </p><br/>";
        }

        if(empty($s_id)) {
            echo "<p class='error'>Student ID field is empty </p><br/>";
        }

        if(empty($s_p_email)) {
            echo "<p class='error'>Personal email field is empty </p><br/>";
        }

        if(empty($s_s_email)) {
            echo "<p class='error'>School email field is empty </p><br/>";
        }

        if(empty($phone)) {
            echo "<p class='error'>Phone field is empty </p><br/>";
        }

        if(empty($ed)) {
            echo "<p class='error'>Enrollment date is empty </p><br/>";
        }

        if(empty($eed)) {
            echo "<p class='error'>Expected end date field is empty </p><br/>";
        }

        if(empty($pass)) {
            echo "<p class='error'>Password field is empty </p><br/>";
        }

        if(empty($conf_pass)) {
            echo "<p class='error'>Confirm password field is empty </p><br/>";
        }

        if($dep === '0') {
            echo "<p class='error'>No department selected</p> <br/>";
        }
        echo "<br><a id='back' href='all_students.php'>&larr; Back to students</a>";
    } else if (!($pass === $conf_pass)) {
        echo "<p class='error'>Password does not match! </p><br/>";
        echo "<br><a id='back' href='all_students.php'>&larr; Back to students</a>";
    } else {
        $q = "INSERT INTO students(Department,Fname, Lname, DOB, Place_of_birth, Address, City, Zip, 
              Mother_name, Father_name, Enrollment_date, Expected_end_date, Student_ID, Personal_email, 
              School_email, Phone, Password) 
              VALUES ('$dep','$fname', '$lname', '$dob', '$pob', '$address', '$city', '$zip', 
              '$mother', '$father', '$ed', '$eed', '$s_id', '$s_p_email', '$s_s_email', '$phone', SHA1('$pass'))";
        $r = @mysqli_query($dbc, $q);

        echo "<p id='data'> Data added successfully! </p>";
        echo "<br/><a id='back' href='all_students.php'>View Result</a>";
    }
}
include('footer.php');