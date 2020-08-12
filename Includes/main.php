<?php
$page_title = "E-GraB Electronic Grade Book";
require_once('../mysqli_connect.php');
$sql = @mysqli_query($dbc, "SELECT * FROM professors WHERE Admin = '1'");
$result = mysqli_fetch_array($sql);
include('header.php');
?>
<div class="main_back">
    <div id="log_box">
        <h1>Welcome to E-GraB</h1>
        <h2>Electronic grade book</h2>
        <a class="login" href="login_page.php">Log in</a>
    </div>
    <div id="about">
        <img src="Images/about.png">
        <h1>What is E-GraB ?</h1>
        <p> The Electronic Grade Book or E-GraB for short, is an online grade book of University Lorem Ipsum
            that holds course information, such as professor name, syllabus, attendance, grades and etc.,
            in one user-friendly online system. It allows professors and students to track student progress.
            <br>
            <br>
            This system allows students and professors to access courses, students or any related information
            at any given time or place.
        </p>
    </div>
    <div id="features">
        <div id="elements">
            <div class="part">
                <img src="Images/student.png">
                <h1>Students</h1>
                <p>E-GraB makes it easier for students to track their attendance,
                    grades and overall performance. Having an organized view of courses,
                    helps students to easily achieve their scholar goals.
                </p>
            </div>
            <div class="part">
                <img src="Images/journalist.png">
                <h1>Professors</h1>
                <p>E-GraB improves class management and organization. Professors can easily add students to their classes,
                    add student attendance and grades. All this leads to more time spent on teaching.
                </p>
            </div>
        </div>
    </div>
    <div id="contacts">
        <h1>Admin Contact information</h1>
        <p><?php echo "$result[Fname]"; ?> <?php echo "$result[Lname]"; ?><br>
            Phone: +<?php echo "$result[Phone]"; ?><br>
            Email: <?php echo "$result[School_email]"; ?><br>
            Address: <?php echo "$result[Address]"; ?>
        </p>
    </div>
</div>
<?php
include('footer.php');

