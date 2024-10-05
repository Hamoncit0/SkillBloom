<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<div class="see-course-info bg-light">
    <div class="see-course-main">
        <h2>Nombre del curso</h2>
        <span>Category: Development</span>
        <br>
        <span>4.7 <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i> (22,000) </span>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt, velit. Totam repellendus architecto dicta, soluta reprehenderit aspernatur. Unde doloremque corrupti iusto libero dicta tempore itaque quae delectus quos sunt amet, voluptatum dolor ab eum perspiciatis natus, provident numquam omnis cupiditate? Magni incidunt explicabo dolore aspernatur quos provident velit amet vel.</p>
        <span>
            Created by Gandalf <a href="/chat" class="btn btn-primary" style="margin-left: 10px">Send Message</a>
        </span>
        <br>
        <span>8 total hours | 72 lectures | All levels</span>
    </div>
    <div class="see-course-preview bg-white">
        <video controls>
            <source src="../images/video.mp4" type="video/mp4">
            <source src="movie.ogg" type="video/ogg">
            Your browser does not support the video tag.
        </video>
        <br>
        <h4>MX $180.00</h4>
        <button class="btn btn-primary">Add to Cart</button>
    </div>
    <div class="see-course-levels">
        <ol class="list-group list-group-numbered">
            <li class="list-group-item">Inicializar variables</li>
            <li class="list-group-item">Ciclos</li>
            <li class="list-group-item">Funciones</li>
            <li class="list-group-item">Clases</li>
            <li class="list-group-item">Collections</li>
            <li class="list-group-item">Herencia</li>
            <li class="list-group-item">Promesas</li>
        </ol>
    </div>
    <div class="see-course-comments">
        <h4>Comment Section</h4>
        <div class="comment-section">
            <? require "partials/comment.php" ?>
            <? require "partials/comment.php" ?>
            <? require "partials/comment.php" ?>
            
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</div>
<?php require "partials/footer.php" ?>