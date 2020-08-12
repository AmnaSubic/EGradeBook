<?php
$page_title = 'E-GraB - Add Student';
include('session.php');
include("../mysqli_connect.php");
include("header.php");
?>
    <form action="add_s.php" method="post" name="form1">
        <h1>Add Student</h1>
        <ul class="form">
            <li>
                <label>Full Name</label>
                <input placeholder="First" type="text" name="first_name" maxlength="50">
                <input placeholder="Last" type="text" name="last_name" maxlength="50">
            </li>
            <li>
                <label>Date and place of birth</label>
                <label>
                    <input type="date" name="dob">
                    <input placeholder="Place of birth" type="text" name="pob" maxlength="50">
                </label>

            </li>
            <li>
                <label>Parents</label>
                <input placeholder="Mother name" type="text" name="mother" maxlength="50">
                <input placeholder="Father name" type="text" name="father" maxlength="50">
            </li>
            <li>
                <label>Address, city and Zip code</label>
                <input placeholder="Address" type="text" name="address" maxlength="50">
                <input placeholder="City" type="text" name="city" maxlength="50">
                <input placeholder="Zip" type="number" name="zip" maxlength="10">
            </li>
            <li>
                <label>Personal info</label>
                <input placeholder="Personal e-mail" type="text" name="s_p_email" maxlength="300">
                <input placeholder="Phone" type="text" name="phone" maxlength="20">
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
                    <input type="date" name="ed">
                    Enrollment date
                </label>
                <label>
                    <input type="date" name="eed">
                    Expected end date
                </label>
            </li>
            <li>
                <label>Assigned student information</label>
                <input placeholder="Student ID" type="text" name="s_id" maxlength="12">
                <input placeholder="School e-mail" type="text" name="s_s_email" maxlength="300">
            </li>
            <li>
                <input placeholder="Password" type="password" name="pass" maxlength="255">
                <input placeholder="Confirm password" type="password" name="conf_pass" maxlength="255">
            </li>
            <br>
            <li>
                <input type="submit" name="submit" value="submit">
                <a href="all_students.php">Cancel</a>
            </li>
        </ul>
    </form>
<?php
include ("footer.php");