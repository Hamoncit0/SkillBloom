<?php require 'partials/head.php' ?>
<?php require "partials/nav.php" ?>
<div class="kardex bg-light">
    <h2>Course Title</h2>
    <p>Category: Development</p>
    <p>Description: Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia non, blanditiis dolorum laboriosam adipisci eum impedit error dolores deserunt, aliquam fuga fugit tenetur culpa commodi recusandae rerum, quia distinctio libero neque sunt? Ab quia, velit, corrupti pariatur mollitia quo asperiores possimus aliquid voluptas itaque porro repellendus. Ab libero nesciunt odio?</p>
    <p>Created by Gandalf</p>
    <h4>Price: MX $200.00</h4>
    <span>Score: 4.7 <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i></span>
    <hr>
    <h4>Levels:</h4>
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
        <h2>Reviews:</h2>
        <div class="comment-section">
            <?php require 'partials/comment-admin.php' ?>
            <?php require 'partials/comment-admin.php' ?>
            <?php require 'partials/comment-admin.php' ?>
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
<?php require 'partials/footer.php' ?>