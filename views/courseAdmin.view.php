<?php require 'partials/head.php' ?>
<?php require "partials/nav.php" ?>
<div class="kardex">
    
<?php if ($course): ?>
    <h2><?php echo htmlspecialchars($course->title); ?></h2>
    <p>Category: <?php echo htmlspecialchars($course->category); ?></p>
    <p>Description: <?php echo htmlspecialchars($course->description); ?></p>
    <p>Created by <?php echo htmlspecialchars($course->instructor); ?></p>
    <h4>Price: MX $<?php echo htmlspecialchars($course->price); ?></h4>
    <span>Score: 4.7 <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i></span>
    <hr>
    <h4>Levels:</h4>
    <div class="see-course-levels">
        <ol class="list-group list-group-numbered">
            <?php foreach ($course->levels as $level): ?>
                    <li class="list-group-item"><?php echo htmlspecialchars($level->title); ?> </li>
            <?php endforeach; ?>
        </ol>
    </div>
    <div class="see-course-comments bg-body-secondary">
        <h2>Reviews:</h2>
        <div class="comment-section">
            <?php require 'partials/comment-admin.php' ?>
            <?php require 'partials/comment-admin.php' ?>
            <?php require 'partials/comment-admin.php' ?>
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
<?php endif; ?>
</div>
<?php require 'partials/footer.php' ?>