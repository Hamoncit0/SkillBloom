<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<?php if ($course): ?>
<div class="see-course-info">
    <div class="see-course-main">
        <h2><?php echo htmlspecialchars($course->title); ?></h2>
        <span>Category: <?php echo htmlspecialchars($course->category); ?></span>
        <br>
        <span>
                            <?php 
                            echo $course->rating 
                                ? htmlspecialchars(number_format($course->rating, $course->rating == floor($course->rating) ? 0 : 1)) 
                                : ''; 
                            ?>
                      <?php 
                          if ($course->rating === null) {
                              echo 'No reviews'; // Mostrar mensaje cuando no hay calificación
                          } else {
                              $fullStars = floor($course->rating); // Número de estrellas completas
                              $halfStar = ($course->rating - $fullStars >= 0.5) ? true : false; // Verificar si hay media estrella
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
                          }
                          ?></span>
        <p>Description: <?php echo htmlspecialchars($course->description); ?></p>
        <span>
            <form action="/courseInfo" method="POST">
                Created by <?php echo htmlspecialchars($course->instructor); ?> <button type="submit" name="idInstructor" value="<?php echo htmlspecialchars($course->idInstructor); ?>" class="btn btn-primary" style="margin-left: 10px">Send Message</button>
            </form>
        </span>
    </div>
    <div class="see-course-preview bg-body-tertiary">
        <video controls>
            <source src="./controllers/<?php echo htmlspecialchars($course->previewVideoPath); ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <br>
        <h4>MX $<?php echo htmlspecialchars($course->price); ?></h4>
        <button 
                class="btn btn-primary add-to-cart" 
                data-id="<?php echo $course->id; ?>" 
                 data-title="<?php echo htmlspecialchars($course->title); ?>" 
                data-price="<?php echo htmlspecialchars($course->price); ?>" 
                data-instructor="<?php echo htmlspecialchars($course->instructor); ?>" 
                data-image="<?php echo $course->previewImage ?: 'SkillBloom_icon.png'; ?>">
                Add to cart
        </button>
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
<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <strong class="me-auto">SkillBloom</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div id="toast-body" class="toast-body">
      <!-- El mensaje dinámico aparecerá aquí -->
    </div>
  </div>
</div>
<script>
  // Función para manejar el carrito en localStorage
  document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.add-to-cart');
    
    buttons.forEach(button => {
      button.addEventListener('click', () => {
        const courseId = button.getAttribute('data-id');
        const courseTitle = button.getAttribute('data-title');
        const coursePrice = button.getAttribute('data-price');
        const courseImage = button.getAttribute('data-image');
        const courseInstructor = button.getAttribute('data-instructor');

        // Obtenemos el carrito del localStorage (o inicializamos uno vacío)
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        // Verificar si el curso ya está en el carrito
        const courseExists = cart.some(course => course.id === courseId);

        const toastBody = document.getElementById('toast-body');
        const toastLiveExample = document.getElementById('liveToast');
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);

        if (!courseExists) {
          // Agregar el curso al carrito
          cart.push({ 
            id: courseId, 
            title: courseTitle, 
            price: coursePrice, 
            image: courseImage,
            instructor: courseInstructor
          });

          // Guardar carrito actualizado en localStorage
          localStorage.setItem('cart', JSON.stringify(cart));

          // Mostrar mensaje dinámico en el toast
          toastBody.textContent = `Added "${courseTitle}" to the cart!`;
        } else {
          // Mostrar mensaje dinámico en el toast
          toastBody.textContent = `"${courseTitle}" is already in the cart.`;
        }

        // Mostrar el toast
        toastBootstrap.show();
      });
    });
  });
</script>
