<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<div class="exploreCourses">
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
