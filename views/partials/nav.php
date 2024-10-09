<?php
session_start(); // Inicia la sesión para acceder a los datos

if (isset($_SESSION['user'])) {
    $userRole = $_SESSION['user_role']; // Recupera el rol del usuario

    if ($userRole == 1) //ADMINISTRADOR
    {
      echo 
          '<nav class="navbar navbar-expand-lg navbar-light bg-light">
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
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Development</a></li>
                <li><a class="dropdown-item" href="#">Music</a></li>
                <li><a class="dropdown-item" href="#">Photography</a></li>
              </ul>
            </li>
          </ul>
      
            <!-- Search Bar in the Middle -->
            <form class="d-flex mx-auto col-7">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
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
                        <img class="rounded-circle nav-avatar" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgYN6WeHs6tndhVLPPLjId5KiXOlZ26pLLig&s" alt="" style="width: 40px; height: 40px;">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navAvatarDropdown">
                        <a href="/editProfile" class="dropdown-item">Edit Your Profile</a>
                        <a href="/chat" class="dropdown-item">Messages</a>
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
      </nav>';
    }
    else if($userRole == 2) //INSTRUCTOR
    {
      echo '
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Development</a></li>
            <li><a class="dropdown-item" href="#">Music</a></li>
            <li><a class="dropdown-item" href="#">Photography</a></li>
          </ul>
        </li>
      </ul>
  
        <!-- Search Bar in the Middle -->
        <form class="d-flex mx-auto col-7">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-primary" type="submit"><i class="bi bi-search" style="font-size: 1.2rem; font-weight: bolder;"></i></button>
        </form>
  
        <!-- Login and Sign Up on the Right -->
        <ul class="navbar-nav ms-auto col-4">
          <li class="nav-item">
            <a href="/advancedSearch" class="nav-link">Advanced search</a>
          </li>
          <li class="nav-item">
            <a href="/advancedSearch" class="btn btn-primary">Create a new course</a>
          </li>
          <li>
            <div class="dropdown">
                
                <a data-bs="dropdown" id="navAvatarDropdown" role="button" href="/editProfile">
                    <img class="rounded-circle nav-avatar" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgYN6WeHs6tndhVLPPLjId5KiXOlZ26pLLig&s" alt="" style="width: 40px; height: 40px;">
                </a>
                <div class="dropdown-menu" aria-labelledby="navAvatarDropdown">
                    <a href="/editProfile" class="dropdown-item">Edit Your Profile</a>
                    <a href="/chat" class="dropdown-item">Messages</a>
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
      ';

    }
    else if($userRole == 3) //ESTUDIANTE
    {
       echo '
       <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Development</a></li>
            <li><a class="dropdown-item" href="#">Music</a></li>
            <li><a class="dropdown-item" href="#">Photography</a></li>
          </ul>
        </li>
      </ul>
  
        <!-- Search Bar in the Middle -->
        <form class="d-flex mx-auto col-7">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
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
                    <img class="rounded-circle nav-avatar" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgYN6WeHs6tndhVLPPLjId5KiXOlZ26pLLig&s" alt="" style="width: 40px; height: 40px;">
                </a>
                <div class="dropdown-menu" aria-labelledby="navAvatarDropdown">
                    <a href="/editProfile" class="dropdown-item">Edit Your Profile</a>
                    <a href="/kardex" class="dropdown-item">Kardex</a>
                    <a href="/chat" class="dropdown-item">Messages</a>
                    <div class="dropdown-divider"></div>

                    <a href="/logout" class="dropdown-item">Log Out</a>

                </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
       ';
    }
    
}else //NO ESTA LOGGEADO
{
  
  echo
  '<nav class="navbar navbar-expand-lg navbar-light bg-light">
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
            <ul class="dropdown-menu dropdown-menu">
              <li><a class="dropdown-item" href="/exploreCourses">Development</a></li>
              <li><a class="dropdown-item" href="/exploreCourses">Music</a></li>
              <li><a class="dropdown-item" href="/exploreCourses">Photography</a></li>
            </ul>
          </li>
        </ul>
    
          <!-- Search Bar in the Middle -->
          <form class="d-flex mx-auto col-7">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <a class="btn btn-outline-primary" type="submit" href="/exploreCourses"><i class="bi bi-search" style="font-size: 1.2rem; font-weight: bolder;"></i></a>
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
    </nav>';

}



?>