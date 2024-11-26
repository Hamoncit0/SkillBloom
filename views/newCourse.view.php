<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<div class="new-course">
    <div class="bg-body-tertiary new-course-container">
        <form id="createCourse" action="POST"  enctype="multipart/form-data">
        <h2>Create a new course</h2>
        <div class="newcourse-info">
            <div class="mb-3">
                <label for="">Title:</label>
                <input name="title" type="text" class="form-control" placeholder="Title" id="title">
                <small id="titleError" class="text-danger"></small>
            </div>
            <div class="mb-3">
                <label for="">Description:</label>
                <textarea name="description" type="text" class="form-control" placeholder="Description" id="description"></textarea>
                <small id="descriptionError" class="text-danger"></small>
            </div>
            <div class="mb-3">
                <select name="category" class="form-select" aria-label="Default select example" required id="category">
                    <option value="" disabled selected>Category...</option>
                    <?php if (!empty($categoryList)): ?>
                        <?php foreach ($categoryList as $category): ?>
                            <option value="<?php echo $category->id; ?>" ><?php echo htmlspecialchars($category->name); ?></option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="0">No se cargaron las categorias</option>
                    <?php endif; ?>
                </select>
                <small id="categoryError" class="text-danger"></small>
            </div>
            <div class="mb-3">
                <label for="">Price:</label>
                <input name="price" type="number" class="form-control" placeholder="Price" id="price" min=0>
                <small id="priceError" class="text-danger"></small>
            </div>
            <div class="mb-3">
                <label for="">Preview Image:</label>
                <input name="previewImage" type="file" class="form-control" accept="image/*" id="previewImage">
                <small id="imageError" class="text-danger"></small>
            </div>
            <div class="mb-3">
                <label for="">Preview Video:</label>
                <input name="previewVideo" type="file" class="form-control" accept="video/*" id="previewVideo">
                <small id="videoError" class="text-danger"></small>
            </div>
        </div>
        <div class="levels">
            <h2>Levels</h2>
            <div id="levels-container">
            </div>
            <div id="loading" class="spinner-border text-primary" role="status" hidden>
                <span class="visually-hidden">Loading...</span>
            </div>
            
            <button class="btn btn-secondary" id="addLevelBtn">Create Level</button>
            <button type="submit" class="btn btn-primary" id="createCourseBtn">Create Course</button>
        </div>
        </form>
    </div>
</div>
<script src="../scripts/newCourse.js"></script>
<?php require "partials/footer.php" ?>