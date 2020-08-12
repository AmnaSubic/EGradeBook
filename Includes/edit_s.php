<?php
$page_title = 'E-GraB - Edit Professor';
include('session.php');

include_once('../mysqli_connect.php');
include('header.php');
if(isset($_POST['update'])) {

    $id = $_POST['SID'];

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
        $q = "UPDATE students
              SET Department = '$dep', Fname = '$fname', Lname = '$lname', DOB = '$dob', Place_of_birth = '$pob', 
              Mother_name = '$mother', Father_name = '$father', Address = '$address', City = '$city', Zip = '$zip', 
              Enrollment_date = '$ed', Expected_end_date = '$eed', Student_ID = '$s_id', Personal_email = '$s_p_email', 
              School_email = '$s_s_email', Phone = '$phone', Password = '$pass' 
              WHERE SID = '$id'";
        $r = @mysqli_query($dbc, $q);

        echo "<p id='data'> Data added successfully! </p>";
        echo "<br/><a id='back' href='all_students.php'>View Result</a>";

    }
}
$id = $_GET['id'];
$q = "SELECT * FROM students WHERE SID = '$id'";
$r = @mysqli_query($dbc, $q);

while($res = mysqli_fetch_array($r))
{
    $sid = $res['SID'];
    $dep = $res['Department'];
    $fname = $res['Fname'];
    $lname = $res['Lname'];
    $dob = $res['DOB'];
    $pob = $res['Place_of_birth'];
    $mother = $res['Mother_name'];
    $father = $res['Father_name'];
    $address =$res['Address'];
    $city = $res['City'];
    $zip = $res['Zip'];
    $s_id = $res['Student_ID'];
    $s_p_email = $res['Personal_email'];
    $s_s_email = $res['School_email'];
    $phone = $res['Phone'];
    $ed = $res['Enrollment_date'];
    $eed = $res['Expected_end_date'];
    $pass = $res['Password'];
}
?>
    <main id="register">
        <form action="edit_s.php?id=<?php echo $id; ?>" method="post" name="form1">
            <h1>Edit Student</h1>
            <ul class="form">
                <li>
                    <label>Full Name</label>
                    <input placeholder="First" type="text" name="first_name" maxlength="50" value="<?php echo $fname; ?>">
                    <input placeholder="Last" type="text" name="last_name" maxlength="50" value="<?php echo $lname; ?>">
                </li>
                <li>
                    <label>Date and place of birth</label>
                    <label>
                        <input type="date" name="dob" value="<?php echo $dob; ?>">
                        <input placeholder="Place of birth" type="text" name="pob" maxlength="50" value="<?php echo $pob; ?>">
                    </label>

                </li>
                <li>
                    <label>Parents</label>
                    <input placeholder="Mother name" type="text" name="mother" maxlength="50" value="<?php echo $mother; ?>">
                    <input placeholder="Father name" type="text" name="father" maxlength="50" value="<?php echo $father; ?>">
                </li>
                <li>
                    <label>Address, city and Zip code</label>
                    <input placeholder="Address" type="text" name="address" maxlength="50" value="<?php echo $address; ?>">
                    <input placeholder="City" type="text" name="city" maxlength="50" value="<?php echo $city; ?>">
                    <input placeholder="Zip" type="number" name="zip" maxlength="10" value="<?php echo $zip; ?>">
                </li>
                <li>
                    <label>Personal info</label>
                    <input placeholder="Personal e-mail" type="text" name="s_p_email" maxlength="300" value="<?php echo $s_p_email; ?>">
                    <input placeholder="Phone" type="text" name="phone" maxlength="20" value="<?php echo $phone; ?>">
                </li>
                <li>
                    <h2>Enrollment information</h2>
                    <label>Department</label>
                    <label>
                        <select name="dep">
                            <option value="0">-</option>
                            <option value="1">CS</option>
                            <option value="2">ECON</option>
                            <option value="3">PSIR</option>
                            <option value="4">DOFL</option>
                        </select>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="date" name="ed" value="<?php echo $ed; ?>">
                        Enrollment date
                    </label>
                    <label>
                        <input type="date" name="eed" value="<?php echo $eed; ?>">
                        Expected end date
                    </label>
                </li>
                <li>
                    <label>Assigned student information</label>
                    <input placeholder="Student ID" type="text" name="s_id" maxlength="12" value="<?php echo $s_id; ?>">
                    <input placeholder="School e-mail" type="text" name="s_s_email" maxlength="300" value="<?php echo $s_s_email; ?>">
                </li>
                <li>
                    <input placeholder="Password" type="password" name="pass" maxlength="255">
                    <input placeholder="Confirm password" type="password" name="conf_pass" maxlength="255">
                </li>
                <br>
                <li>
                    <input type="submit" name="update" value="Update">
                    <a href="all_students.php">Cancel</a>
                    <input type="hidden" name="SID" value="<?php echo $id; ?>">
                </li>
            </ul>
        </form>
    </main>
<?php
include('footer.php');
