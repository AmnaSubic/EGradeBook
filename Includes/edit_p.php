<?php
$page_title = 'E-GraB - Edit Professor';
include('session.php');
include_once('../mysqli_connect.php');
include('header.php');
if(isset($_POST['update'])) {

    $id = $_POST['PID'];
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
        $q = "UPDATE professors
              SET Department = '$dep', Gender = '$gender', Fname = '$fname', Lname = '$lname', DOB = '$dob', 
              Place_of_birth = '$pob', Address = '$address', City = '$city', Zip = '$zip', 
              Contract_start_date = '$csd', Contract_end_date = '$ced', Professor_ID = '$p_id', 
              Personal_email = '$p_p_email', School_email = '$p_s_email', Phone = '$phone', Password = '$pass' 
              WHERE PID = '$id'";
        $r = @mysqli_query($dbc, $q);

        echo "<p id='data'> Data updated successfully.";
        echo "<br/><a id='back' href='all_professors.php'>View Result</a>";

        echo mysqli_error($dbc);
    }
}

$id = $_GET['id'];

$q = "SELECT * FROM professors WHERE PID = '$id'";
$r = @mysqli_query($dbc, $q);

while($res = mysqli_fetch_array($r))
{
    $pid = $res['PID'];
    $fname = $res['Fname'];
    $lname = $res['Lname'];
    $dob = $res['DOB'];
    $pob = $res['Place_of_birth'];
    $address =$res['Address'];
    $city = $res['City'];
    $zip = $res['Zip'];
    $p_id = $res['Professor_ID'];
    $p_p_email = $res['Personal_email'];
    $p_s_email = $res['School_email'];
    $phone = $res['Phone'];
    $csd = $res['Contract_start_date'];
    $ced = $res['Contract_end_date'];
    $pass = $res['Password'];
}
?>
    <main id="registerp">
        <form action="edit_p.php?id=<?php echo $id; ?>" method="post" name="form1">
            <h1>Edit Professor</h1>
            <ul class="form">
                <li>
                    <label>Gender</label>
                    <label for="gender">
                        <input type="radio" name="gender" value="1" /> Male
                        <input type="radio" name="gender" value="0" /> Female
                    </label>
                </li>
                <li>
                    <label>Full name</label>
                    <input placeholder="First" type="text" name="first_name" maxlength="50" value="<?php echo $fname; ?>"/>
                    <input placeholder="Last" type="text" name="last_name" maxlength="50" value="<?php echo $lname; ?>">
                </li>
                <li>
                    <label>Date and place of birth</label>
                    <label>
                        <input type="date" name="dob"/ value="<?php echo $dob; ?>">
                        <input placeholder="Place of birth" type="text" name="pob" maxlength="50" value="<?php echo $pob; ?>"/>
                    </label>
                </li>
                <li>
                    <label>Address, city and Zip code</label>
                    <input placeholder="Address" type="text" name="address" maxlength="50" value="<?php echo $address; ?>">
                    <input placeholder="City" type="text" name="city" maxlength="50" value="<?php echo $city; ?>">
                    <input placeholder="Zip" type="number" name="zip" maxlength="10" value="<?php echo $zip; ?>">
                </li>
                <li>
                    <label>Personal info</label>
                    <input placeholder="Personal e-mail" type="text" name="p_p_email" maxlength="300" value="<?php echo $p_p_email; ?>"/>
                    <input placeholder="Phone" type="text" name="phone" maxlength="20" value="<?php echo $phone; ?>"/>
                </li>
                <li>
                    <h2>Assignment information</h2>
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
                        <input type="date" name="csd" value="<?php echo $csd; ?>"/>
                        Contract start date
                    </label>

                    <label>
                        <input type="date" name="ced" value="<?php echo $ced; ?>"/>
                        Contract end date
                    </label>
                </li>
                <li>
                    <label>Assigned professor information</label>
                    <input placeholder="Professor ID" type="text" name="p_id" maxlength="12" value="<?php echo $p_id; ?>"/>
                    <input placeholder="School e-mail" type="text" name="p_s_email" maxlength="300" value="<?php echo $p_s_email; ?>"/>
                </li>
                <li>
                    <label>
                        <input placeholder="Password" type="password" name="pass" maxlength="255"/>
                        <input placeholder="Confirm password" type="password" name="conf_pass" maxlength="255"/>
                    </label>
                </li>
                <br>
                <li>
                    <input type="submit" name="update" value="Update"/>
                    <a href="all_professors.php">Cancel</a>
                    <input type="hidden" name="PID" value="<?php echo $id; ?>">
                </li>
            </ul>
        </form>
    </main>
<?php
include('footer.php');
