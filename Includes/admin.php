<?php
$page_title = 'E-GraB - Admin';
include('session.php');
$user_id = $_SESSION['PID'];
include('header.php');
?>
<div class="admin">
    <h1>Welcome, <?php echo "Admin"; ?></h1>
    <h2>What would you like to see first?</h2>
    <div class="image_container">
        <a href="all_students.php"><img class="image" src="Images/student.png" alt="students">
            <div class="overlay">
                <p class="text">Students</p>
            </div>
        </a>
    </div>
    <div class="image_container">
        <a href="all_professors.php"><img class=image src="Images/journalist.png" alt="professors">
            <div class="overlay">
                <p class="text">Professors</p>
            </div>
        </a>
    </div>
    <div class="image_container">
        <a href="all_course_ca.php"><img class=image src="Images/check-list.png" alt="courses">
            <div class="overlay">
                <p class="text">Courses</p>
            </div>
        </a>
    </div>
</div>
<?php
include('footer.php');