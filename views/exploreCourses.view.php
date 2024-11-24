<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<div class="exploreCourses bg-light">
    <h1>Explore Courses</h1>
    <h3>The newest courses</h3>
    <hr>
    <?php if (!empty($courseList)): ?>
        <div class="coursesContainer">
            <?php foreach ($courseList as $course): ?>
                <div class="course bg-light-subtle">
                    <img src="<?php echo $course->previewImage ?: 'SkillBloom_icon.png' ?>" alt="huh">
                    <h3><?php echo htmlspecialchars($course->title); ?></h3>
                    <p><?php echo htmlspecialchars($course->instructor); ?></p>
                    <span>4.7 <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i> (22,000) </span>
                    <p class="fs-4 fw-bold">MX$<?php echo htmlspecialchars($course->price); ?></p>
                    <a href="" class="btn btn-primary">Add to cart</a>
                    <a href="/courseInfo?id=<?php echo urlencode($course->id); ?>" class="btn btn-outline-primary">See more</a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No hay usuarios disponibles.</p>
    <?php endif; ?>

</div>
<?php require "partials/footer.php" ?>