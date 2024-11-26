<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<div class="student-courses">
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
        <?php if (!empty($courseList)): ?>
            <?php foreach ($courseList as $course): ?>
                <div class="course bg-light-subtle">
                    <img src="<?php echo $course->previewImage ?: './images/SkillBloom_icon.png' ?>" alt="">
                    <h3><?php echo htmlspecialchars($course->title); ?></h3>
                    <p><?php echo htmlspecialchars($course->instructor); ?></p>
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuemin="0" aria-valuemax="100" style="margin: 0.5rem; background-color: #0000006b">
                        <div class="progress-bar" style="width: <?php echo htmlspecialchars($course->progress); ?>%"></div>
                    </div>
                    <p class="fs-4 fw-bold">Progress: <?php echo htmlspecialchars($course->progress); ?>%</p>
                    <a href="/courseLevel?course=<?php echo htmlspecialchars($course->id);?>&level=<?php echo htmlspecialchars($course->lastLevel);?>" class="btn btn-primary">Continue</a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>You still don't have any courses.</p>
        <?php endif; ?>
    </div>

</div>
<?php require "partials/footer.php" ?>