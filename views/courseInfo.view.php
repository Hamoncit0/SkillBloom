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
            <source src="./controllers/<?php echo htmlspecialchars($course->previewVideoPath); ?>" type="video/mp4">
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
        <?php if (!empty($reviews)): ?>
            <?php foreach ($reviews as $review): ?>
                <div class="comment bg-body">
                    <div class="comment-profile">
                        <img src="<?php echo htmlspecialchars($review->pfp ?: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgYN6WeHs6tndhVLPPLjId5KiXOlZ26pLLig&s"); ?>" class="rounded-circle img-fluid comment-pfp" alt="">
                        <span>
                            <p><?php echo htmlspecialchars($review->name); ?></p>
                            <?php
                                $datetime = explode(' ', $review->createdAt); // Dividir en fecha y hora
                                $date = $datetime[0];
                                $time = date('H:i', strtotime($datetime[1])); // Formatear la hora sin segundos
                            ?>
                            <p><?php echo htmlspecialchars($date); ?></p>
                            <p><?php echo htmlspecialchars($time); ?></p>
                        </span>
                    </div>
                    <p><?php echo htmlspecialchars($review->review); ?></p>
                    <span>
                        <?php 
                            $fullStars = floor($review->rating); // Número de estrellas completas
                            $halfStar = ($review->rating - $fullStars >= 0.5) ? true : false; // Verificar si hay media estrella
                            $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0); // Estrellas vacías

                            // Estrellas completas
                            for ($i = 0; $i < $fullStars; $i++) {
                                echo '<i class="bi bi-star-fill"></i>';
                            }

                            // Media estrella
                            if ($halfStar) {
                                echo '<i class="bi bi-star-half"></i>';
                            }

                            // Estrellas vacías
                            for ($i = 0; $i < $emptyStars; $i++) {
                                echo '<i class="bi bi-star"></i>';
                            }
                        ?>
                    </span>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>There aren't any comments yet.</p>
        <?php endif; ?>
        </div>
        <!-- <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav> -->
    </div>
</div>
<?php endif; ?>
<?php require "partials/footer.php" ?>