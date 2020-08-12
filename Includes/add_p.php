<?php
$page_title = 'E-GraB - Add Professor';
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
    $p_id = $_POST['p_id'];
    $p_p_email = $_POST['p_p_email'];
    $p_s_email = $_POST['p_s_email'];
    $phone = $_POST['phone'];
    $csd = $_POST['csd'];
    $ced = $_POST['ced'];
    $pass = $_POST['pass'];
    $conf_pass = $_POST['conf_pass'];
    $dep = $_POST['dep'];
    $gender = $_POST['gender'];

    if(empty($fname) || empty($lname) || empty($dob) || empty($pob) || empty($address) || empty($city) ||
        empty($zip) || empty($p_id) || empty($p_p_email) || empty($p_s_email) || empty($phone) ||
        empty($csd) || empty($ced) || empty($pass) || empty($conf_pass) || $gender === 'N' || $dep === '0') {
        echo "<p id='err'>Errors: </p><br>";
        if ($gender === 'N') {
            echo "<p class='error'>Select Male or Female </p><br/>";
        }
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

        if(empty($address)) {
            echo "<p class='error'>Address field is empty </p><br/>";
        }

        if(empty($city)) {
            echo "<p class='error'>City field is empty </p><br/>";
        }

        if(empty($zip)) {
            echo "<p class='error'>Zip field is empty </p><br/>";
        }

        if(empty($p_id)) {
            echo "<p class='error'>Professor ID field is empty </p><br/>";
        }

        if(empty($p_p_email)) {
            echo "<p class='error'>Personal email field is empty</p><br/>";
        }

        if(empty($p_s_email)) {
            echo "<p class='error'>School email field is empty </p><br/>";
        }

        if(empty($phone)) {
            echo "<p class='error'>Phone field is empty </p><br/>";
        }

        if(empty($csd)) {
            echo "<p class='error'>Contract start date field is empty </p><br/>";
        }

        if(empty($ced)) {
            echo "<p class='error'>Contract end date field is empty </p><br/>";
        }

        if(empty($pass)) {
            echo "<p class='error'>Password field is empty </p><br/>";
        }

        if(empty($conf_pass)) {
            echo "<p class='error'>Confirm password field is empty </p><br/>";
        }

        if($dep === '0') {
            echo "<p class='error'>No department selected </p><br/>";
        }
        echo "<br><a id='back' href='all_professors.php'>&larr; Back to professors</a>";
    } else if (!($pass === $conf_pass)) {
        echo "<p class='error'>Password does not match! </p><br/>";
        echo "<br><a id='back' href='all_professors.php'>&larr; Back to professors</a>";
    } else {
        $q = "INSERT INTO professors(Department, Gender,Fname, Lname, DOB, Place_of_birth, Address, City, Zip, 
              Contract_start_date, Contract_end_date, Professor_ID, Personal_email, School_email, 
              Phone, Password) 
              VALUES ('$dep', '$gender', '$fname', '$lname', '$dob', '$pob', '$address', '$city', '$zip', 
              '$csd', '$ced', '$p_id', '$p_p_email', '$p_s_email', '$phone', SHA1('$pass'))";
        $r = @mysqli_query($dbc, $q);

        echo "<p id='data'> Data added successfully.";
        echo "<br><a id='back' href='all_professors.php'>View Results</a>";
    }
}
include('footer.php');