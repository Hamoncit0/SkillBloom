<?php require 'partials/head.php' ?>
<?php require 'partials/nav.php' ?>
<div class="advanced-search">
<form method="GET" class="bg-body-secondary">
    <h2>Advanced Search</h2>
    <!-- Filter by Title -->
    <div class="mb-3">
        <label for="title" class="h5">By Title:</label>
        <input type="text" name="title" id="title" class="form-control" value="<?php echo isset($_GET['title']) ? htmlspecialchars($_GET['title']) : ''; ?>">
    </div>
    <!-- Filter by Category -->
    <div class="mb-3">
        <label for="category" class="h5">By Category:</label>
        <select name="category" id="category" class="form-select">
            <option value="">Select</option>
            <?php if (!empty($categoryList)): ?>
                <?php foreach ($categoryList as $category): ?>
                    <option value="<?php echo $category->id; ?>" 
                        <?php echo isset($_GET['category']) && $_GET['category'] == $category->id ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($category->name); ?>
                    </option>
                <?php endforeach; ?>
            <?php else: ?>
                <option value="0">No se cargaron las categorías</option>
            <?php endif; ?>
        </select>
    </div>
    <!-- Filter by Review Score -->
    <div class="mb-3">
        <label for="review" class="h5">By Review Score:</label>
        <select name="review" id="review" class="form-select">
            <option value="">Select</option>
            <option value="1" <?php echo isset($_GET['review']) && $_GET['review'] == '1' ? 'selected' : ''; ?>>1 star</option>
            <option value="2" <?php echo isset($_GET['review']) && $_GET['review'] == '2' ? 'selected' : ''; ?>>2 stars</option>
            <option value="3" <?php echo isset($_GET['review']) && $_GET['review'] == '3' ? 'selected' : ''; ?>>3 stars</option>
            <option value="4" <?php echo isset($_GET['review']) && $_GET['review'] == '4' ? 'selected' : ''; ?>>4 stars</option>
            <option value="5" <?php echo isset($_GET['review']) && $_GET['review'] == '5' ? 'selected' : ''; ?>>5 stars</option>
        </select>
    </div>

    <!-- Filter by Price Range -->
    <div class="mb-3">
        <label class="h5">Price Range:</label>
        <div class="mb-3">
            <label for="price_min" class="h6">From:</label>
            <input type="number" name="price_min" id="price_min" class="form-control" value="<?php echo isset($_GET['price_min']) ? htmlspecialchars($_GET['price_min']) : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="price_max" class="h6">To:</label>
            <input type="number" name="price_max" id="price_max" class="form-control" value="<?php echo isset($_GET['price_max']) ? htmlspecialchars($_GET['price_max']) : ''; ?>">
        </div>
    </div>

            <!-- Filter More -->
            <div class="mb-3">
        <label for="review" class="h5">More:</label>
        <select name="review" id="review" class="form-select">
            <option value="">Select</option>
            <option value="1">Best sellers</option>
            <option value="2">The most recent</option>
            <option value="3">Top Rated Courses</option>
        </select>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Search</button>
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
