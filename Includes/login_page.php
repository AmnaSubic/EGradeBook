<?php
session_start();
$page_title = 'E-GraB Login';
include("../mysqli_connect.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    $myemail = mysqli_real_escape_string($dbc, $_POST['email']);
    $mypassword = mysqli_real_escape_string($dbc, $_POST['pass']);
    $sql = "SELECT PID, Admin FROM professors WHERE School_email = '$myemail' AND password = '$mypassword'";
    $result = @mysqli_query($dbc, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $_SESSION['login_user'] = $myemail;
        $_SESSION['PID'] = $row['PID'];
        $_SESSION['Admin'] = $row['Admin'];
        if ($row['Admin'] === '1') {
            header("location: admin.php");
            exit();
        } else if ($row['Admin'] === '0') {
            header("location: professor.php");
            exit();
        }
    } else {
        $sql = "SELECT SID FROM students WHERE School_email = '$myemail' AND Password = '$mypassword'";
        $result = mysqli_query($dbc, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            $_SESSION['login_user'] = $myemail;
            $_SESSION['SID'] = $row['SID'];
            header("location: student.php");
            exit();
        } else {
            $error = "Your Login Name or Password is invalid";
            echo "<p id='error'>".$error."</p>";
        }
    }
}
include('header.php');
?>
<div class="clear"></div>
<div class="login_main">
    <div class="loginbox">
        <img src="Images/avatar.png" class="avatar">
        <h1>Login</h1>
        <form action="" method="post">
            <p>Email</p>
            <label>
                <input type="text" name="email">
            </label>
            <p>Password</p>
            <label>
                <input type="password" name="pass">
            </label>
            <input type="submit" name="submit" value="Login">
        </form>
    </div>
</div>
<?php
include('footer.php');