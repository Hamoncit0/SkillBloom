<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
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
        
      <div class="category"><a href="/exploreCourses" style="text-decoration: none; color:inherit">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-braces" viewBox="0 0 16 16">
          <path d="M2.114 8.063V7.9c1.005-.102 1.497-.615 1.497-1.6V4.503c0-1.094.39-1.538 1.354-1.538h.273V2h-.376C3.25 2 2.49 2.759 2.49 4.352v1.524c0 1.094-.376 1.456-1.49 1.456v1.299c1.114 0 1.49.362 1.49 1.456v1.524c0 1.593.759 2.352 2.372 2.352h.376v-.964h-.273c-.964 0-1.354-.444-1.354-1.538V9.663c0-.984-.492-1.497-1.497-1.6M13.886 7.9v.163c-1.005.103-1.497.616-1.497 1.6v1.798c0 1.094-.39 1.538-1.354 1.538h-.273v.964h.376c1.613 0 2.372-.759 2.372-2.352v-1.524c0-1.094.376-1.456 1.49-1.456V7.332c-1.114 0-1.49-.362-1.49-1.456V4.352C13.51 2.759 12.75 2 11.138 2h-.376v.964h.273c.964 0 1.354.444 1.354 1.538V6.3c0 .984.492 1.497 1.497 1.6"/>
        </svg>
        <h4 class="h4">Development</h4>
      </a></div>
      
      <div class="category"><a href="/exploreCourses" style="text-decoration: none; color:inherit">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-music-note-beamed" viewBox="0 0 16 16">
          <path d="M6 13c0 1.105-1.12 2-2.5 2S1 14.105 1 13s1.12-2 2.5-2 2.5.896 2.5 2m9-2c0 1.105-1.12 2-2.5 2s-2.5-.895-2.5-2 1.12-2 2.5-2 2.5.895 2.5 2"/>
          <path fill-rule="evenodd" d="M14 11V2h1v9zM6 3v10H5V3z"/>
          <path d="M5 2.905a1 1 0 0 1 .9-.995l8-.8a1 1 0 0 1 1.1.995V3L5 4z"/>
        </svg>
        <h4 class="h4">Music</h4>
      </a></div>

      <div class="category"><a href="/exploreCourses" style="text-decoration: none; color:inherit">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-translate" viewBox="0 0 16 16">
          <path d="M4.545 6.714 4.11 8H3l1.862-5h1.284L8 8H6.833l-.435-1.286zm1.634-.736L5.5 3.956h-.049l-.679 2.022z"/>
          <path d="M0 2a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v3h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zm7.138 9.995q.289.451.63.846c-.748.575-1.673 1.001-2.768 1.292.178.217.451.635.555.867 1.125-.359 2.08-.844 2.886-1.494.777.665 1.739 1.165 2.93 1.472.133-.254.414-.673.629-.89-1.125-.253-2.057-.694-2.82-1.284.681-.747 1.222-1.651 1.621-2.757H14V8h-3v1.047h.765c-.318.844-.74 1.546-1.272 2.13a6 6 0 0 1-.415-.492 2 2 0 0 1-.94.31"/>
        </svg>
        <h4 class="h4">Languages</h4>
      </a></div>

      <div class="category"><a href="/exploreCourses" style="text-decoration: none; color:inherit">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-piggy-bank" viewBox="0 0 16 16">
          <path d="M5 6.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0m1.138-1.496A6.6 6.6 0 0 1 7.964 4.5c.666 0 1.303.097 1.893.273a.5.5 0 0 0 .286-.958A7.6 7.6 0 0 0 7.964 3.5c-.734 0-1.441.103-2.102.292a.5.5 0 1 0 .276.962"/>
          <path fill-rule="evenodd" d="M7.964 1.527c-2.977 0-5.571 1.704-6.32 4.125h-.55A1 1 0 0 0 .11 6.824l.254 1.46a1.5 1.5 0 0 0 1.478 1.243h.263c.3.513.688.978 1.145 1.382l-.729 2.477a.5.5 0 0 0 .48.641h2a.5.5 0 0 0 .471-.332l.482-1.351c.635.173 1.31.267 2.011.267.707 0 1.388-.095 2.028-.272l.543 1.372a.5.5 0 0 0 .465.316h2a.5.5 0 0 0 .478-.645l-.761-2.506C13.81 9.895 14.5 8.559 14.5 7.069q0-.218-.02-.431c.261-.11.508-.266.705-.444.315.306.815.306.815-.417 0 .223-.5.223-.461-.026a1 1 0 0 0 .09-.255.7.7 0 0 0-.202-.645.58.58 0 0 0-.707-.098.74.74 0 0 0-.375.562c-.024.243.082.48.32.654a2 2 0 0 1-.259.153c-.534-2.664-3.284-4.595-6.442-4.595M2.516 6.26c.455-2.066 2.667-3.733 5.448-3.733 3.146 0 5.536 2.114 5.536 4.542 0 1.254-.624 2.41-1.67 3.248a.5.5 0 0 0-.165.535l.66 2.175h-.985l-.59-1.487a.5.5 0 0 0-.629-.288c-.661.23-1.39.359-2.157.359a6.6 6.6 0 0 1-2.157-.359.5.5 0 0 0-.635.304l-.525 1.471h-.979l.633-2.15a.5.5 0 0 0-.17-.534 4.65 4.65 0 0 1-1.284-1.541.5.5 0 0 0-.446-.275h-.56a.5.5 0 0 1-.492-.414l-.254-1.46h.933a.5.5 0 0 0 .488-.393m12.621-.857a.6.6 0 0 1-.098.21l-.044-.025c-.146-.09-.157-.175-.152-.223a.24.24 0 0 1 .117-.173c.049-.027.08-.021.113.012a.2.2 0 0 1 .064.199"/>
        </svg>
        <h4 class="h4">Business</h4>
      </a></div>
      
      <div class="category"><a href="/exploreCourses" style="text-decoration: none; color:inherit">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera" viewBox="0 0 16 16">
          <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4z"/>
          <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5m0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7M3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>
        </svg>
        <h4 class="h4">Photography</h4>
      </a></div>
      
      <div class="category"><a href="/exploreCourses" style="text-decoration: none; color:inherit">
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
        <button class="btn btn-primary fw-bold fs-4">Start teaching today</button>
      </div>
     </div>
</div>
<?php require "partials/footer.php" ?>