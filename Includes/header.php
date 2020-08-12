<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html" charset=UTF-8">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/page.css" type="text/css" media="all">
    <link rel="stylesheet" href="CSS/profile.css" type="text/css" media="all">
    <link rel="stylesheet" href="CSS/mainlogin.css" type="text/css" media="all">
    <script src="JavaScript/page_content.js" type="text/javascript"></script>
</head>

<?php
if (!empty($_SESSION['login_user'])) {
?>
<body>
<div class="side-navigation side-bar-block side-card side-animate-left" style="display: none;" id="mySidebar">
    <button class="side-bar-item side-button side-xlarge" onclick="side_close()">&times;</button>
    <?php
    if ($_SESSION['Admin'] === '1') {
        echo "<a href=\"admin.php\" class=\"side-bar-item side-button\"><i class=\"fa fa-user-circle\" aria-hidden=\"true\"></i> Profile</a>";
        echo "<a href=\"all_students.php\" class=\"side-bar-item side-button\"><i class=\"fa fa-graduation-cap\" aria-hidden=\"true\"></i> Students</a>";
        echo "<a href=\"all_professors.php\" class=\"side-bar-item side-button\"><i class=\"fa fa-briefcase\" aria-hidden=\"true\"></i> Professors</a>";
        echo "<a href=\"all_course_ca.php\" class=\"side_bar_item side_button\">&nbsp;&nbsp;<i class=\"fa fa-book\" aria-hidden=\"true\"></i> CA</a>";
    } else if ($_SESSION['Admin'] === '0') {
        echo "<a href=\"professor.php\" class=\"side-bar-item side-button\"><i class=\"fa fa-user-circle\" aria-hidden=\"true\"></i> Profile</a>";
        echo "<a href=\"courses_p.php\" class=\"side-bar-item side-button\"><i class=\"fa fa-tasks\" aria-hidden=\"true\"></i> Courses</a>";
    } else {
        echo "<a href=\"student.php\" class=\"side-bar-item side-button\"><i class=\"fa fa-user-circle\" aria-hidden=\"true\"></i> Profile</a>";
        echo "<a href=\"courses_s.php\" class=\"side-bar-item side-button\"><i class=\"fa fa-tasks\" aria-hidden=\"true\"></i> Courses</a>";
    }
    ?>
</div>
<div id="page">
<header class="top-navigation">
    <div class="logo">
        <img src="Images/Logo.png" alt="Logo" id="logo">
        <h2>E-GraB</h2>
    </div>
    <div class="buttons">
        <button class="side-button side-xlarge" id="openNav" onclick="side_open()" ><i class="fa fa-outdent"></i>
        </button>
        <a href="logout.php">
            <button class="side-button side-xlarge" id="logOut"><i class="fa fa-sign-out" aria-hidden="true"></i>
            </button>
        </a>
    </div>
</header>
<?php
} else {
?>
<body class="background">
<div class="main_page">
<header class="top-navigation">
    <nav class="main-page-nav">
        <div class="logo">
            <img src="Images/Logo.png" alt="Logo" id="logo">
            <a href="main.php"><h2>E-GraB</h2></a>
        </div>
        <ul>
            <li><a href="main.php#about">About</a></li>
            <li><a href="main.php#contacts">Contacts</a></li>
        </ul>
    </nav>
</header>
<?php
}