<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (isset($_SESSION['user'])) {
  $userRole = $_SESSION['user_role']; 
  if($userRole == 1){ ?>
    <div id="carouselCourses" class="carousel slide home-carousel" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="https://i.pinimg.com/originals/10/28/f9/1028f99fd8f021b7b30e6e1899a88b29.gif" class="d-block w-100" alt="..."/>
          
          <div class="info-box  bg-body-tertiary">
            <h3>User management</h3>
            <p class="fs-4">You have decision when it comes to our users.</p>
            <a href="/userList" class="btn btn-outline-primary">Manage users</a>
          </div>

        </div>
        <div class="carousel-item">
          <img src="https://i.pinimg.com/originals/b5/8c/42/b58c42d5930fcec1934dfd38674d3a5e.gif" class="d-block w-100" alt="..."/>

          <div class="info-box  bg-body-tertiary">
            <h3>Please take a look...</h3>
            <p class="fs-4">Please help us make a better community.</p>
            <a href="/courseList" class="btn btn-outline-primary">Manage Courses</a>
          </div>

        </div>
        <div class="carousel-item">
          <img src="https://i.pinimg.com/originals/36/00/02/360002e4690d7889f7a3ca2ea406ea15.gif" class="d-block w-100" alt="..."/>

          <div class="info-box bg-body-tertiary">
            <h3>Make new categories</h3>
            <p class="fs-4">We always want to be on the trend help us.</p>
            <a href="/category" class="btn btn-outline-primary">Edit categories</a>
          </div>

        </div>
      </div>
    
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselCourses" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselCourses" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    
<!-- Categorías para Administrador -->
<div class="categories" id="admin-categories">
    <div class="cat-flex">
        <!-- Buscar -->
        <div class="category">
            <a href="/exploreCourses" style="text-decoration: none; color: inherit">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
            </svg>
                <h4 class="h4">Buscar</h4>
            </a>
        </div>

        <!-- Restablecer Contraseña -->
        <div class="category">
            <a href="/userList" style="text-decoration: none; color: inherit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
                    <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8m4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5"/>
                    <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                </svg>
                <h4 class="h4">Restablecer Contraseña</h4>
            </a>
        </div>
        <!-- Configuración del Sistema -->
        <div class="category">
            <a href="/category" style="text-decoration: none; color: inherit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                    <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0"/>
                    <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z"/>
                </svg>
                <h4 class="h4">Configuración</h4>
            </a>
        </div>
    </div>
</div>

<?php
  }
  else if($userRole == 2){?>
    <div class="home">
        <div id="carouselCourses" class="carousel slide home-carousel" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="https://i.pinimg.com/originals/4e/1f/30/4e1f306cf9ce2f0255a5538be608a519.gif" class="d-block w-100" alt="..."/>
              
              <div class="info-box  bg-body-tertiary">
                <h3>Make a new course?</h3>
                <p class="fs-4">It's always a great day to share knowledge.</p>
                <a href="/newCourse" class="btn btn-outline-primary">Create a course</a>
              </div>

            </div>
            <div class="carousel-item">
              <img src="https://i.pinimg.com/originals/71/8b/5b/718b5b9e3d1ead677348c3525e5c30dd.gif" class="d-block w-100" alt="..."/>

              <div class="info-box  bg-body-tertiary">
                <h3>Wanna see your revenue?</h3>
                <p class="fs-4">Obtain detailed information about your courses</p>
                <a href="/salesSummary" class="btn btn-outline-primary">See more</a>
              </div>

            </div>
            <div class="carousel-item">
              <img src="https://i.pinimg.com/originals/1f/47/b9/1f47b96070237ce6abea38462d1dcca3.gif" class="d-block w-100" alt="..."/>

              <div class="info-box bg-body-tertiary">
                <h3>Ready to see..</h3>
                <p class="fs-4">Information about your courses.</p>
                <a href="/myCourses" class="btn btn-outline-primary">Manage</a>
              </div>

            </div>
          </div>
        
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselCourses" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselCourses" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        <div class="more p-4">
          <h1> Hi, <?php echo htmlspecialchars($user->firstName); ?> 👋</h1>
          <h3>What would you like to do today?</h3>
          <hr>

<!-- Categorías del Instructor -->
<div class="categories" id="instructor-categories">
    <div class="cat-flex">
        <div class="category">
            <a href="/newCourse" style="text-decoration: none; color: inherit">
                <!-- Ícono de Crear Curso -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                </svg>
                <h4 class="h4">Crear Curso</h4>
            </a>
        </div>
        <div class="category">
            <a href="/studentsPerCourse" style="text-decoration: none; color: inherit">
                <!-- Ícono de Estadísticas -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-bar-chart" viewBox="0 0 16 16">
                    <path d="M0 0h16v16H0V0zm2 14h2V6H2v8zm4 0h2V2H6v12zm4 0h2V8h-2v6z"/>
                </svg>
                <h4 class="h4">Ver Estadísticas</h4>
            </a>
        </div>
        <div class="category">
            <a href="/exploreCourses" style="text-decoration: none; color: inherit">
                <!-- Ícono de Lupa -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                </svg>
                <h4 class="h4">Buscar</h4>
            </a>
        </div>
        <div class="category">
            <a href="/salesSummary" style="text-decoration: none; color: inherit">
                <!-- Ícono de Dólar -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73z"/>
                </svg>
                <h4 class="h4">Ventas</h4>
            </a>
        </div>
    </div>
</div>
        </div>

    </div>

  <?php
  }
  else if($userRole == 3){?>

  <div class="home">
        <div id="carouselCourses" class="carousel slide home-carousel" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="https://i.pinimg.com/originals/0c/7b/7b/0c7b7bd6de1525cecb762d4f3de34ea1.gif" class="d-block w-100" alt="..."/>
              
              <div class="info-box  bg-body-tertiary">
                <h3>Más Vendidos</h3>
                <p class="fs-4">Conoce nuestros cursos mas populares en el mercado.</p>
                <a href="/exploreCourses?filter=most_sold" class="btn btn-outline-primary">Conoce nuestros cursos</a>
              </div>

            </div>
            <div class="carousel-item">
              <img src="https://i.pinimg.com/originals/b6/76/dc/b676dc712d7ea4c837e0993a30156f26.gif" class="d-block w-100" alt="..."/>

              <div class="info-box  bg-body-tertiary">
                <h3>Mejor Calificados</h3>
                <p class="fs-4">Explora nuestros cursos mejor calificados.</p>
                <a href="/exploreCourses?filter=best_rated" class="btn btn-outline-primary">Conoce nuestros cursos</a>
              </div>

            </div>
            <div class="carousel-item">
              <img src="https://i.pinimg.com/originals/3d/d2/86/3dd286a8c85ad38a5d7e0aa60139ac08.gif" class="d-block w-100" alt="..."/>

              <div class="info-box bg-body-tertiary">
                <h3>Mas Recientes</h3>
                <p class="fs-4">Decubre todo lo nuevo que tenemos para tí.</p>
                <a href="/exploreCourses?filter=newest" class="btn btn-outline-primary">Conoce nuestros cursos</a>
              </div>

            </div>
          </div>
        
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselCourses" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselCourses" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        <div class="p-4">
          <h2>Continue Learning...</h2>
          <div class="course-container">
            <?php if (!empty($courseList)): ?>
                <?php 
                // Limitar la lista a un máximo de 5 cursos
                $limitedCourses = array_slice($courseList, 0, 4); 
                ?>
                <?php foreach ($limitedCourses as $course): ?>
                    <div class="course bg-light-subtle">
                        <img src="<?php echo $course->previewImage ?: 'images/SkillBloom_icon.png'; ?>" alt="">
                        <h3><?php echo htmlspecialchars($course->title); ?></h3>
                        <p><?php echo htmlspecialchars($course->instructor); ?></p>
                        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuemin="0" aria-valuemax="100" style="margin: 0.5rem; background-color: #0000006b">
                            <div class="progress-bar" style="width: <?php echo htmlspecialchars($course->progress); ?>%"></div>
                        </div>
                        <p class="fs-4 fw-bold">Progress: <?php echo htmlspecialchars($course->progress); ?>%</p>
                        <a href="/courseLevel?course=<?php echo htmlspecialchars($course->id); ?>&level=<?php echo htmlspecialchars($course->lastLevel); ?>" class="btn btn-primary">Continue</a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>You still don't have any courses.</p>
            <?php endif; ?>
          </div>
          
          <div class="categories" id="categories">
          <div class="cat-flex">
              <div class="category">
                  <a href="/exploreCourses" style="text-decoration: none; color: inherit">
                      <!-- Ícono de Lupa -->
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                      </svg>
                      <h4 class="h4">Explorar Cursos</h4>
                  </a>
              </div>
              <div class="category">
                  <a href="/yourCourses" style="text-decoration: none; color: inherit">
                      <!-- Ícono de Libro -->
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                          <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                      </svg>
                      <h4 class="h4">Continuar Curso</h4>
                  </a>
              </div>
              <div class="category">
                  <a href="/exploreCourses?filter=best_rated" style="text-decoration: none; color: inherit">
                      <!-- Ícono de Estrella -->
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-star" viewBox="0 0 24 24">
                          <path d="M12 .587l3.668 7.431 8.19 1.188-5.906 5.568L19.2 24 12 20.482 4.8 24l1.248-9.226L.142 9.206l8.19-1.188L12 .587z"/>
                      </svg>
                      <h4 class="h4">Recomendaciones</h4>
                  </a>
              </div>
              <div class="category">
                  <a href="/exploreCourses?filter=most_sold" style="text-decoration: none; color: inherit">
                      <!-- Ícono de Llama -->
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fire" viewBox="0 0 16 16">
                      <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16m0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15"/>
                      </svg>

                      <h4 class="h4">Tendencia</h4>
                  </a>
              </div>
          </div>
        </div>

    </div>
<?php
  }
}
else{ ?>
  
  <div class="home">
      <!-- Carrusel de imagenes -->
      <div id="carouselHome" class="carousel slide home-carousel" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://i.pinimg.com/originals/34/d7/a3/34d7a3bbe7ab056f213e66c7182dd57e.gif" class="d-block w-100" alt="..."/>
            
            <div class="info-box  bg-body-tertiary">
              <h3>Habilidades que te llevan hacia adelante</h3>
              <p class="fs-4">Conocimiento que te impulsa a aprender más en el mundo laboral.</p>
              <a href="/login" class="btn btn-outline-primary">Log In</a>
              <a href="/signup" class="btn btn-primary">Sign Up</a>
            </div>

          </div>
          <div class="carousel-item">
            <img src="https://i.pinimg.com/originals/f7/19/65/f71965732082901a89adedcde2051bd7.gif" class="d-block w-100" alt="..."/>

            <div class="info-box  bg-body-tertiary">
              <h3>Conoce acerca de nuestro nuevos cursos</h3>
              <p class="fs-4">Mientras mas pronto te prepares mas rapido podras llegar al exito.</p>
              <a href="/exploreCourses" class="btn btn-outline-primary">Conoce nuestros cursos</a>
            </div>

          </div>
          <div class="carousel-item">
            <img src="https://i.pinimg.com/originals/50/fd/4a/50fd4a7d39b88a7fd0cc43aaaefc9649.gif" class="d-block w-100" alt="..."/>

            <div class="info-box bg-body-tertiary">
              <h3>¿Te gustaria aprender sobre lo que te gusta?</h3>
              <p class="fs-4">No te preocupes, tenemos para todos los gustos</p>
              <a href="/exploreCourses" class="btn btn-outline-primary">Conoce nuestros cursos</a>
            </div>

          </div>
        </div>
      
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselHome" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselHome" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <!-- Categorias -->
      <div class="categories">
        <h2 class="h2">Top Categories</h2>
        <div class="cat-flex">
          
        <div class="category"><a href="/advancedSearch?category=6" style="text-decoration: none; color:inherit">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-braces" viewBox="0 0 16 16">
            <path d="M2.114 8.063V7.9c1.005-.102 1.497-.615 1.497-1.6V4.503c0-1.094.39-1.538 1.354-1.538h.273V2h-.376C3.25 2 2.49 2.759 2.49 4.352v1.524c0 1.094-.376 1.456-1.49 1.456v1.299c1.114 0 1.49.362 1.49 1.456v1.524c0 1.593.759 2.352 2.372 2.352h.376v-.964h-.273c-.964 0-1.354-.444-1.354-1.538V9.663c0-.984-.492-1.497-1.497-1.6M13.886 7.9v.163c-1.005.103-1.497.616-1.497 1.6v1.798c0 1.094-.39 1.538-1.354 1.538h-.273v.964h.376c1.613 0 2.372-.759 2.372-2.352v-1.524c0-1.094.376-1.456 1.49-1.456V7.332c-1.114 0-1.49-.362-1.49-1.456V4.352C13.51 2.759 12.75 2 11.138 2h-.376v.964h.273c.964 0 1.354.444 1.354 1.538V6.3c0 .984.492 1.497 1.497 1.6"/>
          </svg>
          <h4 class="h4">Development</h4>
        </a></div>
        
        <div class="category"><a href="/advancedSearch?category=3" style="text-decoration: none; color:inherit">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-music-note-beamed" viewBox="0 0 16 16">
            <path d="M6 13c0 1.105-1.12 2-2.5 2S1 14.105 1 13s1.12-2 2.5-2 2.5.896 2.5 2m9-2c0 1.105-1.12 2-2.5 2s-2.5-.895-2.5-2 1.12-2 2.5-2 2.5.895 2.5 2"/>
            <path fill-rule="evenodd" d="M14 11V2h1v9zM6 3v10H5V3z"/>
            <path d="M5 2.905a1 1 0 0 1 .9-.995l8-.8a1 1 0 0 1 1.1.995V3L5 4z"/>
          </svg>
          <h4 class="h4">Music</h4>
        </a></div>

        <div class="category"><a href="/advancedSearch?category=4" style="text-decoration: none; color:inherit">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-translate" viewBox="0 0 16 16">
            <path d="M4.545 6.714 4.11 8H3l1.862-5h1.284L8 8H6.833l-.435-1.286zm1.634-.736L5.5 3.956h-.049l-.679 2.022z"/>
            <path d="M0 2a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v3h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zm7.138 9.995q.289.451.63.846c-.748.575-1.673 1.001-2.768 1.292.178.217.451.635.555.867 1.125-.359 2.08-.844 2.886-1.494.777.665 1.739 1.165 2.93 1.472.133-.254.414-.673.629-.89-1.125-.253-2.057-.694-2.82-1.284.681-.747 1.222-1.651 1.621-2.757H14V8h-3v1.047h.765c-.318.844-.74 1.546-1.272 2.13a6 6 0 0 1-.415-.492 2 2 0 0 1-.94.31"/>
          </svg>
          <h4 class="h4">Languages</h4>
        </a></div>

        <div class="category"><a href="/advancedSearch?category=2" style="text-decoration: none; color:inherit">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-piggy-bank" viewBox="0 0 16 16">
            <path d="M5 6.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0m1.138-1.496A6.6 6.6 0 0 1 7.964 4.5c.666 0 1.303.097 1.893.273a.5.5 0 0 0 .286-.958A7.6 7.6 0 0 0 7.964 3.5c-.734 0-1.441.103-2.102.292a.5.5 0 1 0 .276.962"/>
            <path fill-rule="evenodd" d="M7.964 1.527c-2.977 0-5.571 1.704-6.32 4.125h-.55A1 1 0 0 0 .11 6.824l.254 1.46a1.5 1.5 0 0 0 1.478 1.243h.263c.3.513.688.978 1.145 1.382l-.729 2.477a.5.5 0 0 0 .48.641h2a.5.5 0 0 0 .471-.332l.482-1.351c.635.173 1.31.267 2.011.267.707 0 1.388-.095 2.028-.272l.543 1.372a.5.5 0 0 0 .465.316h2a.5.5 0 0 0 .478-.645l-.761-2.506C13.81 9.895 14.5 8.559 14.5 7.069q0-.218-.02-.431c.261-.11.508-.266.705-.444.315.306.815.306.815-.417 0 .223-.5.223-.461-.026a1 1 0 0 0 .09-.255.7.7 0 0 0-.202-.645.58.58 0 0 0-.707-.098.74.74 0 0 0-.375.562c-.024.243.082.48.32.654a2 2 0 0 1-.259.153c-.534-2.664-3.284-4.595-6.442-4.595M2.516 6.26c.455-2.066 2.667-3.733 5.448-3.733 3.146 0 5.536 2.114 5.536 4.542 0 1.254-.624 2.41-1.67 3.248a.5.5 0 0 0-.165.535l.66 2.175h-.985l-.59-1.487a.5.5 0 0 0-.629-.288c-.661.23-1.39.359-2.157.359a6.6 6.6 0 0 1-2.157-.359.5.5 0 0 0-.635.304l-.525 1.471h-.979l.633-2.15a.5.5 0 0 0-.17-.534 4.65 4.65 0 0 1-1.284-1.541.5.5 0 0 0-.446-.275h-.56a.5.5 0 0 1-.492-.414l-.254-1.46h.933a.5.5 0 0 0 .488-.393m12.621-.857a.6.6 0 0 1-.098.21l-.044-.025c-.146-.09-.157-.175-.152-.223a.24.24 0 0 1 .117-.173c.049-.027.08-.021.113.012a.2.2 0 0 1 .064.199"/>
          </svg>
          <h4 class="h4">Business</h4>
        </a></div>
        
        <div class="category"><a href="/advancedSearch?category=7" style="text-decoration: none; color:inherit">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera" viewBox="0 0 16 16">
            <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4z"/>
            <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5m0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7M3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>
          </svg>
          <h4 class="h4">Photography</h4>
        </a></div>
        
        <div class="category"><a href="/advancedSearch?category=5" style="text-decoration: none; color:inherit">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brush" viewBox="0 0 16 16">
            <path d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.1 6.1 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.1 8.1 0 0 1-3.078.132 4 4 0 0 1-.562-.135 1.4 1.4 0 0 1-.466-.247.7.7 0 0 1-.204-.288.62.62 0 0 1 .004-.443c.095-.245.316-.38.461-.452.394-.197.625-.453.867-.826.095-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.201-.925 1.746-.896q.19.012.348.048c.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.176-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04M4.705 11.912a1.2 1.2 0 0 0-.419-.1c-.246-.013-.573.05-.879.479-.197.275-.355.532-.5.777l-.105.177c-.106.181-.213.362-.32.528a3.4 3.4 0 0 1-.76.861c.69.112 1.736.111 2.657-.12.559-.139.843-.569.993-1.06a3 3 0 0 0 .126-.75zm1.44.026c.12-.04.277-.1.458-.183a5.1 5.1 0 0 0 1.535-1.1c1.9-1.996 4.412-5.57 6.052-8.631-2.59 1.927-5.566 4.66-7.302 6.792-.442.543-.795 1.243-1.042 1.826-.121.288-.214.54-.275.72v.001l.575.575zm-4.973 3.04.007-.005zm3.582-3.043.002.001h-.002z"/>
          </svg>
          <h4 class="h4">Design</h4>
          </a></div>

        </div>
      </div>
      
      <!-- Comentarios -->
      <div class="opSection bg-light-subtle">
        <h2>Estudiantes como tu estan cumpliendo sus metas</h2>
        <div id="carouselComents" class="carousel slide home-carousel" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="card-wrapper">
                <div class="card home-opinion">
                  <div class="card-body">
                    <h5 class="card-title">"</h5>
                    <p class="card-text">Estoy orgulloso de decir que he cumplido mis metas, me siento como alguien nuevo, que ha podido avanzar hacia adelante y ser exitoso.</p>
                    <small>Will A</small>
                  </div>
                </div>
                <div class="card home-opinion">
                  <div class="card-body">
                    <h5 class="card-title">"</h5>
                    <p class="card-text">Estoy orgulloso de decir que he cumplido mis metas, me siento como alguien nuevo, que ha podido avanzar hacia adelante y ser exitoso.</p>
                    <small>Will A</small>
                  </div>
                </div>
                <div class="card home-opinion">
                  <div class="card-body">
                    <h5 class="card-title">"</h5>
                    <p class="card-text">Estoy orgulloso de decir que he cumplido mis metas, me siento como alguien nuevo, que ha podido avanzar hacia adelante y ser exitoso.</p>
                    <small>Will A</small>
                  </div>
                </div>
                <div class="card home-opinion">
                  <div class="card-body">
                    <h5 class="card-title">"</h5>
                    <p class="card-text">Estoy orgulloso de decir que he cumplido mis metas, me siento como alguien nuevo, que ha podido avanzar hacia adelante y ser exitoso.</p>
                    <small>Will A</small>
                  </div>
                </div>
              
              </div>
    
            </div>
            <div class="carousel-item">
              <div class="card-wrapper">
                <div class="card home-opinion">
                  <div class="card-body">
                    <h5 class="card-title">"</h5>
                    <p class="card-text">Estoy orgulloso de decir que he cumplido mis metas, me siento como alguien nuevo, que ha podido avanzar hacia adelante y ser exitoso.</p>
                    <small>Will A</small>
                  </div>
                </div>
                <div class="card home-opinion">
                  <div class="card-body">
                    <h5 class="card-title">"</h5>
                    <p class="card-text">Estoy orgulloso de decir que he cumplido mis metas, me siento como alguien nuevo, que ha podido avanzar hacia adelante y ser exitoso.</p>
                    <small>Will A</small>
                  </div>
                </div>
                <div class="card home-opinion">
                  <div class="card-body">
                    <h5 class="card-title">"</h5>
                    <p class="card-text">Estoy orgulloso de decir que he cumplido mis metas, me siento como alguien nuevo, que ha podido avanzar hacia adelante y ser exitoso.</p>
                    <small>Will A</small>
                  </div>
                </div>
                <div class="card home-opinion">
                  <div class="card-body">
                    <h5 class="card-title">"</h5>
                    <p class="card-text">Estoy orgulloso de decir que he cumplido mis metas, me siento como alguien nuevo, que ha podido avanzar hacia adelante y ser exitoso.</p>
                    <small>Will A</small>
                  </div>
                </div>
                
              </div>
    
            </div>

            <div class="carousel-item">
              <div class="card-wrapper">
                <div class="card home-opinion">
                  <div class="card-body">
                    <h5 class="card-title">"</h5>
                    <p class="card-text">Estoy orgulloso de decir que he cumplido mis metas, me siento como alguien nuevo, que ha podido avanzar hacia adelante y ser exitoso.</p>
                    <small>Will A</small>
                  </div>
                </div>
                <div class="card home-opinion">
                  <div class="card-body">
                    <h5 class="card-title">"</h5>
                    <p class="card-text">Estoy orgulloso de decir que he cumplido mis metas, me siento como alguien nuevo, que ha podido avanzar hacia adelante y ser exitoso.</p>
                    <small>Will A</small>
                  </div>
                </div>
                <div class="card home-opinion">
                  <div class="card-body">
                    <h5 class="card-title">"</h5>
                    <p class="card-text">Estoy orgulloso de decir que he cumplido mis metas, me siento como alguien nuevo, que ha podido avanzar hacia adelante y ser exitoso.</p>
                    <small>Will A</small>
                  </div>
                </div>
                <div class="card home-opinion">
                  <div class="card-body">
                    <h5 class="card-title">"</h5>
                    <p class="card-text">Estoy orgulloso de decir que he cumplido mis metas, me siento como alguien nuevo, que ha podido avanzar hacia adelante y ser exitoso.</p>
                    <small>Will A</small>
                  </div>
                </div>
              
              </div>
    
            </div>
          </div>
        
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselComents" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselComents" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <div id="carouselCourses" class="carousel slide home-carousel" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://i.pinimg.com/originals/0c/7b/7b/0c7b7bd6de1525cecb762d4f3de34ea1.gif" class="d-block w-100" alt="..."/>
            
            <div class="info-box  bg-body-tertiary">
              <h3>Más Vendidos</h3>
              <p class="fs-4">Conoce nuestros cursos mas populares en el mercado.</p>
              <a href="/exploreCourses?filter=most_sold" class="btn btn-outline-primary">Conoce nuestros cursos</a>
            </div>

          </div>
          <div class="carousel-item">
            <img src="https://i.pinimg.com/originals/b6/76/dc/b676dc712d7ea4c837e0993a30156f26.gif" class="d-block w-100" alt="..."/>

            <div class="info-box  bg-body-tertiary">
              <h3>Mejor Calificados</h3>
              <p class="fs-4">Explora nuestros cursos mejor calificados.</p>
              <a href="/exploreCourses?filter=best_rated" class="btn btn-outline-primary">Conoce nuestros cursos</a>
            </div>

          </div>
          <div class="carousel-item">
            <img src="https://i.pinimg.com/originals/3d/d2/86/3dd286a8c85ad38a5d7e0aa60139ac08.gif" class="d-block w-100" alt="..."/>

            <div class="info-box bg-body-tertiary">
              <h3>Mas Recientes</h3>
              <p class="fs-4">Decubre todo lo nuevo que tenemos para tí.</p>
              <a href="/exploreCourses?filter=newest" class="btn btn-outline-primary">Conoce nuestros cursos</a>
            </div>

          </div>
        </div>
      
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselCourses" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselCourses" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>



        
      <!-- Conviertete en un instructor -->
      <div class="teach">
        <img src="https://i.pinimg.com/564x/c1/dd/77/c1dd77948fe783c0a3e8aec69ba02c39.jpg" alt="">
        <div class="beTeacherInfo">
          <h2>Become an instructor</h2>
          <p class="fs-4">Intructors around the world teach millions of learners in Skill Bloom. We provide the tools and skills to teach what you love</p>
          <a class="btn btn-primary fw-bold fs-4" href="/signup">Start teaching today</a>
        </div>
      </div>
  </div>

<?php
}


?>
<?php require "partials/footer.php" ?>