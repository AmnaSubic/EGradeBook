<?php
$page_title = 'E-GraB - Add Professor';
include('session.php');
include("../mysqli_connect.php");
include("header.php");
?>
    <div id="register">
            <form action="add_p.php" method="post" name="form1">
                <h1>Add Professor</h1>
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
                        <input placeholder="First" type="text" name="first_name" maxlength="50"/>
                        <input placeholder="Last" type="text" name="last_name" maxlength="50"/>
                    </li>
                    <li>
                        <label>Date and place of birth</label>
                        <label>
                            <input type="date" name="dob"/>
                            <input placeholder="Place of birth" type="text" name="pob" maxlength="50"/>
                        </label>
                    </li>
                    <li>
                        <label>Address, city and Zip code</label>
                        <input placeholder="Address" type="text" name="address" maxlength="50">
                        <input placeholder="City" type="text" name="city" maxlength="50">
                        <input placeholder="Zip" type="number" name="zip" maxlength="10">
                    </li>
                    <li>
                        <label>Personal info</label>
                        <input placeholder="Personal e-mail" type="text" name="p_p_email" maxlength="300"/>
                        <input placeholder="Phone" type="text" name="phone" maxlength="20"/>
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
                            <input type="date" name="csd"/>
                            Contract start date
                        </label>

                        <label>
                            <input type="date" name="ced"/>
                            Contract end date
                        </label>
                    </li>
                    <li>
                        <label>Assigned professor information</label>
                        <input placeholder="Professor ID" type="text" name="p_id" maxlength="12"/>
                        <input placeholder="School e-mail" type="text" name="p_s_email" maxlength="300"/>
                    </li>
                    <li>
                        <label>
                            <input placeholder="Password" type="password" name="pass" maxlength="255"/>
                            <input placeholder="Confirm password" type="password" name="conf_pass" maxlength="255"/>
                        </label>
                    </li>
                    <br>
                    <li>
                        <input type="submit" name="submit" value="submit"/>
                        <a href="all_professors.php">Cancel</a>
                    </li>
                </ul>
            </form>
    </div>
<?php
include ("footer.php");