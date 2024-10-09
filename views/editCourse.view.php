<?php require 'partials/head.php' ?>
<?php require "partials/nav.php" ?>
<div class="new-course  bg-light">
    <div class="bg-white new-course-container">
        <h2>Create a new course</h2>
        <div class="newcourse-info">
            <div class="mb-3">
                <label for="">Title:</label>
                <input value="titulo" type="text" class="form-control" placeholder="Title" id="title">
                <small id="titleError" class="text-danger"></small>
            </div>
            <div class="mb-3">
                <label for="">Description:</label>
                <textarea type="text" class="form-control" placeholder="Description" id="description">descripcion</textarea>
                <small id="descriptionError" class="text-danger"></small>
            </div>
            <div class="mb-3">
                <label for="">Price:</label>
                <input value="250" type="number" class="form-control" placeholder="Price" id="price">
                <small id="priceError" class="text-danger"></small>
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" required id="category">
                    <option value="" disabled >Category...</option>
                    <option value="student" selected>Music</option>
                    <option value="instructor">Development</option>
                </select>
                <small id="categoryError" class="text-danger"></small>
            </div>
            <div class="mb-3">
                <label for="">Preview Image:</label>
                <input type="file" class="form-control" accept="image/*" id="previewImage">
                <small id="imageError" class="text-danger"></small>
            </div>
            <div class="mb-3">
                <label for="">Preview Video:</label>
                <input type="file" class="form-control" accept="video/*" id="previewVideo">
                <small id="videoError" class="text-danger"></small>
            </div>
        </div>
        <div class="levels">
            <h2>Levels</h2>
            <div id="levels-container">
               
            </div>
            
            <button class="btn btn-secondary" id="addLevelBtn">Add Level</button>
            <button class="btn btn-primary" id="createCourseBtn">Save changes</button>
        </div>

    </div>
</div>
<script src="../scripts/editCourse.js"></script>
<?php require 'partials/footer.php' ?>