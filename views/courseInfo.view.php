<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<?php if ($course): ?>
<div class="see-course-info">
    <div class="see-course-main">
        <h2><?php echo htmlspecialchars($course->title); ?></h2>
        <span>Category: <?php echo htmlspecialchars($course->category); ?></span>
        <br>
        <span>4.7 <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i> (22,000) </span>
        <p>Description: <?php echo htmlspecialchars($course->description); ?></p>
        <span>
            Created by <?php echo htmlspecialchars($course->instructor); ?> <a href="/chat" class="btn btn-primary" style="margin-left: 10px">Send Message</a>
        </span>
        <br>
        <span>8 total hours | 72 lectures | All levels</span>
    </div>
    <div class="see-course-preview bg-body-tertiary">
        <video controls>
            <source src="../images/video.mp4" type="video/mp4">
            <source src="movie.ogg" type="video/ogg">
            Your browser does not support the video tag.
        </video>
        <br>
        <h4>MX $<?php echo htmlspecialchars($course->price); ?></h4>
        <button class="btn btn-primary">Add to Cart</button>
    </div>
    <div class="see-course-levels">
        <ol class="list-group list-group-numbered">
            <?php foreach ($course->levels as $level): ?>
            <li class="list-group-item"><?php echo htmlspecialchars($level->title); ?> </li>
            <?php endforeach; ?>
        </ol>
    </div>
    <div class="see-course-comments bg-body-secondary">
        <h4>Comment Section</h4>
        <div class="comment-section">
            <?php require "partials/comment.php" ?>
            <?php require "partials/comment.php" ?>
            <?php require "partials/comment.php" ?>
            
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</div>
<?php endif; ?>
<?php require "partials/footer.php" ?>