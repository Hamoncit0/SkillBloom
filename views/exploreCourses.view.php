<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<div class="exploreCourses">
    <h1><?php echo $header ?></h1>
    <hr>

    <h4>Filter by:</h4>
    <form method="GET" >
        <select name="filter" class="form-select w-25" onchange="this.form.submit()">
        <option value="">Select</option>
        <option value="most_sold" <?php echo isset($_GET['filter']) && $_GET['filter'] === 'most_sold' ? 'selected' : ''; ?>>Most Sold</option>
        <option value="best_rated" <?php echo isset($_GET['filter']) && $_GET['filter'] === 'best_rated' ? 'selected' : ''; ?>>Best Rated</option>
        <option value="newest" <?php echo isset($_GET['filter']) && $_GET['filter'] === 'newest' ? 'selected' : ''; ?>>Newest</option>
        </select>
    </form>
<?php if (!empty($courseList)): ?>
        <div class="coursesContainer">
            <?php foreach ($courseList as $course): ?>
                <div class="course bg-light-subtle">
                    <img src="<?php echo $course->previewImage ?: 'SkillBloom_icon.png' ?>" alt="huh">
                    <h3><?php echo htmlspecialchars($course->title); ?></h3>
                    <p><?php echo htmlspecialchars($course->instructor); ?></p>
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
                    <p class="fs-4 fw-bold">MX$<?php echo htmlspecialchars($course->price); ?></p>
                    <button 
                        class="btn btn-primary add-to-cart" 
                        data-id="<?php echo $course->id; ?>" 
                        data-title="<?php echo htmlspecialchars($course->title); ?>" 
                        data-price="<?php echo htmlspecialchars($course->price); ?>" 
                        data-instructor="<?php echo htmlspecialchars($course->instructor); ?>" 
                        data-image="<?php echo $course->previewImage ?: 'SkillBloom_icon.png'; ?>">
                        Add to cart
                    </button>
                    <a href="/courseInfo?id=<?php echo urlencode($course->id); ?>" class="btn btn-outline-primary">See more</a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>There aren't any new courses.</p>
    <?php endif; ?>
</div>
<?php require 'partials/footer.php' ?>
</div>

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
