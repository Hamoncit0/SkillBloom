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
  </nav>