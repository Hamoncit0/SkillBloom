<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<div class="see-course-info">
    <div class="see-course-main">
        <h2>Nombre del curso</h2>
        <span>Category: Development</span>
        <h4>Review Score:</h4>
        <h6>4.5/5</h6>
        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar" style="width: 90%"></div>
        </div>
        <h3>Enrolled Students: 80</h3>
        <h4>Students who completed this course: 65</h4>
        <h3>Total income: MX $80,000.00</h3>
        <p>Description: Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate magnam magni culpa? Ipsum eaque cupiditate fugit illo earum at praesentium est excepturi quae sunt quasi exercitationem sint distinctio necessitatibus ut officiis cumque debitis, ratione animi neque eos in? Dolore consequuntur quos distinctio sit. Fuga unde ipsum temporibus non? Est, a!</p>
    </div>
    <div class="see-course-preview bg-body-tertiary" style="justify-self:right;">
        <video controls>
            <source src="../images/video.mp4" type="video/mp4">
            <source src="movie.ogg" type="video/ogg">
            Your browser does not support the video tag.
        </video>
    </div>
    <div class="see-course-comments bg-body-secondary">
        <h4>Reviews</h4>
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