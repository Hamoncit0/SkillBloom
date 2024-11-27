<?php
require_once 'clases/controllers/CategoryController.php';

$categoryController = new CategoryController();
$categories = $categoryController->getCategories();
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (isset($_SESSION['user'])) {
    $userRole = $_SESSION['user_role']; // Recupera el rol del usuario
    $userAvatar = isset($_SESSION['user_avatar']) ? $_SESSION['user_avatar'] : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgYN6WeHs6tndhVLPPLjId5KiXOlZ26pLLig&s'; // Asegúrate de obtener la URL de la imagen

    if ($userRole == 1) //ADMINISTRADOR
    {?>
          <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <!-- Brand and Categories -->
          <a class="navbar-brand" href="/">Skill Bloom</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse row" id="navbarNav">
            <ul class="navbar-nav col-1 me-auto">
            <li class="nav-item dropdown">
              <button class="btn nav-link" data-bs-toggle="dropdown" aria-expanded="false">
                Categories
              </button>
              <?php if (!empty($categories)): ?>
                <ul class="dropdown-menu">
                  <?php foreach ($categories as $category): ?>
                    <li><a class="dropdown-item" href="/advancedSearch?category=<?php echo htmlspecialchars($category->id); ?>"><?php echo htmlspecialchars($category->name); ?></a></li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
            </li>
          </ul>
      
            <!-- Search Bar in the Middle -->
            <form  method="GET" action="/advancedSearch" class="d-flex mx-auto col-7">
              <input class="form-control me-2" type="search" placeholder="Search" name="title" aria-label="Search">
              <button class="btn btn-outline-primary" type="submit"><i class="bi bi-search" style="font-size: 1.2rem; font-weight: bolder;"></i></button>
            </form>
      
            <!-- Login and Sign Up on the Right -->
            <ul class="navbar-nav ms-auto col-4">
              <li class="nav-item">
                <a href="/advancedSearch" class="nav-link">Advanced search</a>
              </li>
              <li>
                <div class="dropdown">
                    <a data-bs="dropdown" id="navAvatarDropdown" role="button" href="/editProfile">
                        <img class="rounded-circle nav-avatar" src="<?php echo htmlspecialchars($userAvatar); ?>" alt="User Avatar" style="width: 40px; height: 40px;">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navAvatarDropdown">
                        <a href="/editProfile" class="dropdown-item">Edit Your Profile</a>
                        <a href="/chatlist" class="dropdown-item">Messages</a>
                        <a href="/userList" class="dropdown-item">User List</a>
                        <a href="/courseList" class="dropdown-item">Course list</a>
                        <a href="/category" class="dropdown-item">Edit categories</a>
                        <div class="dropdown-divider"></div>
                        <a href="/logout" class="dropdown-item">Log Out</a>
                    </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav><?php
    }
    else if($userRole == 2) //INSTRUCTOR
    {
      ?>
      <nav class="navbar navbar-expand-lg  bg-body-tertiary">
    <div class="container-fluid">
      <!-- Brand and Categories -->
      <a class="navbar-brand" href="/">Skill Bloom</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse row" id="navbarNav">
        <ul class="navbar-nav col-1 me-auto">
        <li class="nav-item dropdown">
          <button class="btn nav-link" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </button>
          <?php if (!empty($categories)): ?>
                <ul class="dropdown-menu">
                  <?php foreach ($categories as $category): ?>
                    <li><a class="dropdown-item" href="/advancedSearch?category=<?php echo htmlspecialchars($category->id); ?>"><?php echo htmlspecialchars($category->name); ?></a></li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
        </li>
      </ul>
  
        <!-- Search Bar in the Middle -->
        <form  method="GET" action="/advancedSearch" class="d-flex mx-auto col-7">
          <input class="form-control me-2" type="search" placeholder="Search" name="title" aria-label="Search">
          <button class="btn btn-outline-primary" type="submit"><i class="bi bi-search" style="font-size: 1.2rem; font-weight: bolder;"></i></button>
        </form>
  
        <!-- Login and Sign Up on the Right -->
        <ul class="navbar-nav ms-auto col-4">
          <li class="nav-item">
            <a href="/advancedSearch" class="nav-link">Advanced search</a>
          </li>
          <li class="nav-item">
            <a href="/newCourse" class="btn btn-primary">Create a new course</a>
          </li>
          <li>
            <div class="dropdown">
                <a data-bs="dropdown" id="navAvatarDropdown" role="button" href="/editProfile">
                    <img class="rounded-circle nav-avatar" src="<?php echo htmlspecialchars($userAvatar); ?>" alt="User Avatar" style="width: 40px; height: 40px;">
                </a>
                <div class="dropdown-menu" aria-labelledby="navAvatarDropdown">
                    <a href="/editProfile" class="dropdown-item">Edit Your Profile</a>
                    <a href="/chatlist" class="dropdown-item">Messages</a>
                    <a href="/salesSummary" class="dropdown-item">Sales Summary</a>
                    <a href="/myCourses" class="dropdown-item">My Courses</a>
                    <a href="/studentsPerCourse" class="dropdown-item">Enrolled Students</a>
                    <div class="dropdown-divider"></div>
                    <a href="/logout" class="dropdown-item">Log Out</a>
                </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
      <?php
    }
    else if($userRole == 3) //ESTUDIANTE
    {
       ?> 
       <nav class="navbar navbar-expand-lg  bg-body-tertiary">
    <div class="container-fluid">
      <!-- Brand and Categories -->
      <a class="navbar-brand" href="/">Skill Bloom</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse row" id="navbarNav">
        <ul class="navbar-nav col-1 me-auto">
        <li class="nav-item dropdown">
          <button class="btn nav-link" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </button>
          <?php if (!empty($categories)): ?>
                <ul class="dropdown-menu">
                  <?php foreach ($categories as $category): ?>
                    <li><a class="dropdown-item" href="/advancedSearch?category=<?php echo htmlspecialchars($category->id); ?>"><?php echo htmlspecialchars($category->name); ?></a></li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
        </li>
      </ul>
  
        <!-- Search Bar in the Middle -->
        <form  method="GET" action="/advancedSearch" class="d-flex mx-auto col-7">
          <input class="form-control me-2" type="search" placeholder="Search" name="title" aria-label="Search">
          <button class="btn btn-outline-primary" type="submit"><i class="bi bi-search" style="font-size: 1.2rem; font-weight: bolder;"></i></button>
        </form>
  
        <!-- Login and Sign Up on the Right -->
        <ul class="navbar-nav ms-auto col-4">
          <li class="nav-item">
            <a href="/advancedSearch" class="nav-link">Advanced search</a>
          </li>
          <li class="nav-item">
            <a href="/cart" class="nav-link" style="padding: 0;"><i class="bi bi-cart" style="font-size: 1.7rem; "></i></a>
          </li>
          <li class="nav-item">
              <a href="/yourCourses" class="nav-link">My Learning</a>
          </li>
          <li>
            <div class="dropdown">
                <a data-bs="dropdown" id="navAvatarDropdown" role="button" href="/editProfile">
                    <img class="rounded-circle nav-avatar" src="<?php echo htmlspecialchars($userAvatar); ?>" alt="User Avatar" style="width: 40px; height: 40px;">
                </a>
                <div class="dropdown-menu" aria-labelledby="navAvatarDropdown">
                    <a href="/editProfile" class="dropdown-item">Edit Your Profile</a>
                    <a href="/chatlist" class="dropdown-item">Messages</a>
                    <a href="/cart" class="dropdown-item">Shopping Cart</a>
                    <a href="/kardex" class="dropdown-item">Kardex</a>
                    <div class="dropdown-divider"></div>
                    <a href="/logout" class="dropdown-item">Log Out</a>
                </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php
    }
}else //NO ESTA LOGGEADO
{
  ?>
  <nav class="navbar navbar-expand-lg  bg-body-tertiary">
      <div class="container-fluid">
        <!-- Brand and Categories -->
        <a class="navbar-brand" href="/">Skill Bloom</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse row" id="navbarNav">
          <ul class="navbar-nav col-1 me-auto">
          <li class="nav-item dropdown">
            <button class="btn nav-link" data-bs-toggle="dropdown" aria-expanded="false">
              Categories
            </button>
            <?php if (!empty($categories)): ?>
                <ul class="dropdown-menu">
                  <?php foreach ($categories as $category): ?>
                    <li><a class="dropdown-item" href="/advancedSearch?category=<?php echo htmlspecialchars($category->id); ?>"><?php echo htmlspecialchars($category->name); ?></a></li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
          </li>
        </ul>
    
          <!-- Search Bar in the Middle -->
        <form  method="GET" action="/advancedSearch" class="d-flex mx-auto col-7">
          <input class="form-control me-2" type="search" placeholder="Search" name="title" aria-label="Search">
          <button class="btn btn-outline-primary" type="submit"><i class="bi bi-search" style="font-size: 1.2rem; font-weight: bolder;"></i></button>
        </form>
    
          <!-- Login and Sign Up on the Right -->
          <ul class="navbar-nav ms-auto col-4">
            <li class="nav-item">
              <a href="/advancedSearch" class="nav-link">Advanced search</a>
            </li>
            <li class="nav-item">
              <a href="/cart" class="nav-link" style="padding: 0;"><i class="bi bi-cart" style="font-size: 1.7rem; "></i></a>
            </li>
            <li class="nav-item">
              <a href="/login" class="btn btn-outline-primary">Log In</a>
            </li>
            <li class="nav-item">
              <a href="/signup" class="btn btn-primary">Sign Up</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<?php
}
?>
