<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<?php if ($course): ?>
<div class="see-course-info">
    <div class="see-course-main">
        <h2><?php echo htmlspecialchars($course->title); ?></h2>
        <span>Category: <?php echo htmlspecialchars($course->category); ?></span>
        <h4>Review Score:</h4>
        <h6>4.5/5</h6>
        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar" style="width: 90%"></div>
        </div>
        <h3>Enrolled Students: 80</h3>
        <h4>Students who completed this course: 65</h4>
        <h3>Total income: MX $80,000.00</h3>
        <p>Description: <?php echo htmlspecialchars($course->description); ?></p>
    </div>
    <div class="see-course-preview bg-body-tertiary" style="justify-self:right;">
        <video controls>
            <source src="./controllers/<?php echo htmlspecialchars($course->previewVideoPath); ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <div class="see-course-comments bg-body-secondary">
        <h4>Reviews</h4>
        <div class="comment-section">
        <?php if (!empty($reviews)): ?>
            <?php foreach ($reviews as $review): ?>
                <div class="comment bg-body">
                    <div class="comment-profile">
                        <img src="<?php echo htmlspecialchars($review->pfp ?: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgYN6WeHs6tndhVLPPLjId5KiXOlZ26pLLig&s"); ?>" class="rounded-circle img-fluid comment-pfp" alt="">
                        <span>
                            <p style="font-weight: bolder" ><?php echo htmlspecialchars($review->name); ?></p>
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
                        <?php echo htmlspecialchars($review->rating); ?>
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