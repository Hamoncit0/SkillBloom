<?php require 'partials/head.php' ?>
<?php require 'partials/nav.php' ?>
<div class="advanced-search bg-light">
<form method="GET" class="bg-white">
    <h2>Advanced Search</h2>
    <!-- Filter by Title -->
    <div class="mb-3">
        <label for="title" class="h5">By Title:</label>
        <input type="text" name="title" id="title" class="form-control" value="<?php echo isset($_GET['title']) ? htmlspecialchars($_GET['title']) : ''; ?>">
    </div>
    <!-- Filter by Category -->
    <div class="mb-3">
        <label for="category" class="h5">By Category:</label>
        <select name="category" id="category" class="form-select">
            <option value="">Select</option>
            <?php if (!empty($categoryList)): ?>
                <?php foreach ($categoryList as $category): ?>
                    <option value="<?php echo $category->id; ?>" 
                        <?php echo isset($_GET['category']) && $_GET['category'] == $category->id ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($category->name); ?>
                    </option>
                <?php endforeach; ?>
            <?php else: ?>
                <option value="0">No se cargaron las categorías</option>
            <?php endif; ?>
        </select>
    </div>
    <!-- Filter by Review Score -->
    <div class="mb-3">
        <label for="review" class="h5">By Review Score:</label>
        <select name="review" id="review" class="form-select">
            <option value="">Select</option>
            <option value="1" <?php echo isset($_GET['review']) && $_GET['review'] == '1' ? 'selected' : ''; ?>>1 star</option>
            <option value="2" <?php echo isset($_GET['review']) && $_GET['review'] == '2' ? 'selected' : ''; ?>>2 stars</option>
            <option value="3" <?php echo isset($_GET['review']) && $_GET['review'] == '3' ? 'selected' : ''; ?>>3 stars</option>
            <option value="4" <?php echo isset($_GET['review']) && $_GET['review'] == '4' ? 'selected' : ''; ?>>4 stars</option>
            <option value="5" <?php echo isset($_GET['review']) && $_GET['review'] == '5' ? 'selected' : ''; ?>>5 stars</option>
        </select>
    </div>
    <!-- Filter by Price Range -->
    <div class="mb-3">
        <label class="h5">Price Range:</label>
        <div class="mb-3">
            <label for="price_min" class="h6">From:</label>
            <input type="number" name="price_min" id="price_min" class="form-control" value="<?php echo isset($_GET['price_min']) ? htmlspecialchars($_GET['price_min']) : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="price_max" class="h6">To:</label>
            <input type="number" name="price_max" id="price_max" class="form-control" value="<?php echo isset($_GET['price_max']) ? htmlspecialchars($_GET['price_max']) : ''; ?>">
        </div>
    </div>
    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Search</button>
</form>

<?php if (!empty($courseList)): ?>
        <div class="coursesContainer">
            <?php foreach ($courseList as $course): ?>
                <div class="course bg-light-subtle">
                    <img src="<?php echo $course->previewImage ?: 'SkillBloom_icon.png' ?>" alt="huh">
                    <h3><?php echo htmlspecialchars($course->title); ?></h3>
                    <p><?php echo htmlspecialchars($course->instructor); ?></p>
                    <span>4.7 <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i> (22,000) </span>
                    <p class="fs-4 fw-bold">MX$<?php echo htmlspecialchars($course->price); ?></p>
                    <a href="" class="btn btn-primary">Add to cart</a>
                    <a href="/courseInfo?id=<?php echo urlencode($course->id); ?>" class="btn btn-outline-primary">See more</a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No hay cursos disponibles.</p>
    <?php endif; ?>
</div>
<?php require 'partials/footer.php' ?>