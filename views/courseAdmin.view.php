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
            <?php if (!empty($reviews)): ?>
                <?php foreach ($reviews as $review): ?>
                    <p  style="font-weight: bolder; color: <?php echo htmlspecialchars($review->deletedAt ? 'red':'green'); ?>; margin-left: 2rem"><?php echo htmlspecialchars($review->deletedAt ? 'Banned':'Unbanned'); ?></p>
                    <div class="comment bg-body">
                        <div class="comment-admin-profile">
                            
                            <div class="comment-profile">
                                <img src="<?php echo htmlspecialchars($review->pfp ?: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgYN6WeHs6tndhVLPPLjId5KiXOlZ26pLLig&s"); ?>" class="rounded-circle img-fluid comment-pfp" alt="">
                                <span>
                                    <p  style="font-weight: bolder"><?php echo htmlspecialchars($review->name); ?></p>
                                    <?php
                                        $datetime = explode(' ', $review->createdAt); // Dividir en fecha y hora
                                        $date = $datetime[0];
                                        $time = date('H:i', strtotime($datetime[1])); // Formatear la hora sin segundos
                                    ?>
                                    <p><?php echo htmlspecialchars($date); ?></p>
                                    <p><?php echo htmlspecialchars($time); ?></p>
                                </span>
                            </div>
                            <div class="comment-options">
                                
                            <a type="button" data-bs-toggle="modal" data-bs-target="#modalBan" data-id="<?php echo $review->id; ?>" data-action="ban"  class="btn btn-danger"><i class="bi bi-ban"></i></a>
                            <a type="button" data-bs-toggle="modal" data-bs-target="#modalUnban" data-id="<?php echo $review->id; ?>" data-action="unban"  class="btn btn-success"><i class="bi bi-check-circle"></i></a>
                                        
                            </div>
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
<?php endif; ?>
</div>
<?php require 'partials/footer.php' ?>

<div class="modal fade" id="modalBan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Ban Comment?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to ban this comment?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <form id="banForm" method="POST">
            <input type="hidden" name="userId" id="userId" />
            <input type="hidden" name="action" id="action" value="ban" />
            <button type="submit" class="btn btn-primary">Yes, continue</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalUnban" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Unban Comment?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to unban this comment?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <form id="unbanForm" method="POST">
            <input type="hidden" name="userId" id="userIdUnban" />
            <input type="hidden" name="action" id="actionUnban" value="unban" />
            <button type="submit" class="btn btn-primary">Yes, continue</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    // Para capturar el evento de clic y rellenar el formulario
    var banButtons = document.querySelectorAll('[data-bs-toggle="modal"]');
    banButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var userId = this.getAttribute('data-id'); // Obtener el ID del usuario
            var action = this.getAttribute('data-action'); // Obtener la acción (ban/unban)

            if (action === "ban") {
                document.getElementById('userId').value = userId; // Rellenar el ID en el formulario de ban
                document.getElementById('action').value = action; // Rellenar la acción de ban
            } else if (action === "unban") {
                document.getElementById('userIdUnban').value = userId; // Rellenar el ID en el formulario de unban
                document.getElementById('actionUnban').value = action; // Rellenar la acción de unban
            }
        });
    });
</script>
