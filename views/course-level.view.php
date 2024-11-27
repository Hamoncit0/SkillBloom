<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<?php if ($level): ?>
  <div class="course-level">
      <div class="level-content-display">
          <video controls>
                  <source src="./controllers/<?php echo htmlspecialchars($level->contentPath); ?>" type="video/mp4">
                  Your browser does not support the video tag.
          </video>
      </div>
      <div class="level-content-bar bg-body-tertiary">
          <h3><?php echo htmlspecialchars($level->title); ?></h3>
          <div class="buttons">
              <button class="btn btn-dark" onclick="window.location.assign('/courseLevel?course=<?php echo htmlspecialchars($courseId);?>&level=<?php echo htmlspecialchars($idLevelOrder-1); ?>')" <?php echo htmlspecialchars($idLevelOrder!=1?:'disabled'); ?>><i class="bi bi-caret-left-fill"></i>Previous</button>
              <button class="btn btn-dark" onclick="window.location.assign('/courseLevel?course=<?php echo htmlspecialchars($courseId);?>&level=<?php echo htmlspecialchars($idLevelOrder+1); ?>')" <?php echo htmlspecialchars($idLevelOrder < $totalLevels ? '' : 'disabled'); ?> >Next<i class="bi bi-caret-right-fill"></i></button>
          </div>
      </div>
      <div class="level-description">

          <div class="comment-profile">
              <img src="<?php echo htmlspecialchars($user->pfpPath ?: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgYN6WeHs6tndhVLPPLjId5KiXOlZ26pLLig&s'); ?>" class="rounded-circle img-fluid comment-pfp" alt="">
              <span>
                  <p class="fw-bold"><?php echo htmlspecialchars($user->firstName . ' ' . $user->lastName); ?></p>
                  <form class="d-flex" method="POST" action="/courseLevel">
                    <button type="submit" name="idInstructor" value="<?php echo htmlspecialchars($level->idInstructor); ?>" class="btn btn-primary me-3">Send Message</button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Review Course</button>
                  </form>
              </span>
          </div>
          <p><?php echo htmlspecialchars($level->description); ?></p>

      </div>
  </div>

  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form method="POST" action="/courseLevel?course=<?php echo htmlspecialchars($courseId); ?>&level=<?php echo htmlspecialchars($idLevelOrder); ?>" id="reviewForm">
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
                  <input name="rating" id="reviewScore" type="number" class="form-control" max=5 min=0 style="width: 5rem; margin-left: 0.5rem"> <i class="bi bi-star-fill"></i>
                  
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
<?php endif; ?>
<script src="../scripts/reviewValidations.js"></script>
<?php require "partials/footer.php" ?>