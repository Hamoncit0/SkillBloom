<?php require "partials/head.php" ?>
<?php require "partials/nav-student.php" ?>
<div class="student-courses bg-light">
    <h1>Your courses</h1>
    <div class="dropdown">
        <button class="dropdown-toggle btn btn-outline-dark">Incompleted</button>
        
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Completed</a></li>
            <li><a class="dropdown-item" href="#">A-z</a></li>
            <li><a class="dropdown-item" href="#">More Progress</a></li>
        </ul>
    </div>
    <div class="course-container">
        <? require "partials/course-student.php" ?>
        <? require "partials/course-student.php" ?>
        <? require "partials/course-student.php" ?>
        <? require "partials/course-student.php" ?>
        <? require "partials/course-student.php" ?>
        <? require "partials/course-student.php" ?>
        <? require "partials/course-student.php" ?>

    </div>

</div>
<? require "partials/footer.php" ?>