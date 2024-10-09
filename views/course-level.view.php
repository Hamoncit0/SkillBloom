<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<div class="course-level bg-light">
    <div class="level-content-display">
        <video controls>
                <source src="../images/video.mp4" type="video/mp4">
                <source src="movie.ogg" type="video/ogg">
                Your browser does not support the video tag.
        </video>
    </div>
    <div class="level-content-bar bg-white">
        <h3>Course Level</h3>
        <div class="buttons">
            <button class="btn btn-dark"><i class="bi bi-caret-left-fill"></i>Previous</button>
            <button class="btn btn-dark">Next<i class="bi bi-caret-right-fill"></i></button>
        </div>
    </div>
    <div class="level-description">

        <div class="comment-profile">
            <img src="https://img.lovepik.com/element/45016/4170.png_860.png" class="rounded-circle img-fluid comment-pfp" alt="">
            <span>
                <p class="fw-bold">Nombre</p>
                <a href="" class="btn btn-primary">Send Message</a>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Review Course</button>
            </span>
        </div>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga repellat illum porro veniam! Quasi enim harum deleniti placeat nisi, consectetur perferendis animi sapiente rem, pariatur architecto culpa! Laudantium nobis, modi in molestias, ex praesentium facere laboriosam a consequuntur, commodi laborum obcaecati sit accusantium porro quos quae accusamus voluptatum iusto nisi saepe impedit suscipit similique perferendis earum? Iusto exercitationem, provident atque ab at odit tempore cum mollitia? Pariatur numquam asperiores sunt.</p>

    </div>
</div>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="" id="reviewForm">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Review Course</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="mb-3">
                <label for="review">Review:</label>
                <textarea name="review" id="review" class="form-control"></textarea>
                <small class="text-danger" id="reviewError"></small>
            </div>
            <div class="mb-3" style="display:flex; align-items: center;">
                <label for="score">Review score:</label>
                <input name="score" id="reviewScore" type="number" class="form-control" max=5 min=0 style="width: 5rem; margin-left: 0.5rem"> <i class="bi bi-star-fill"></i>
                
              </div>
              <small class="text-danger" id="reviewScoreError"></small>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Review</button>
      </div>
    </div>
    </form>
  </div>
</div>
<script src="../scripts/reviewValidations.js"></script>
<?php require "partials/footer.php" ?>