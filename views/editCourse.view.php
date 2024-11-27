<?php require 'partials/head.php' ?>
<?php require "partials/nav.php" ?>
<div class="new-course">
<?php if ($course): ?>
    <div class="bg-body-tertiary new-course-container">
    <form id="createCourse" action="POST"  enctype="multipart/form-data">
        <h2>Edit course</h2>
        <div class="newcourse-info">
            <div class="mb-3">
                <label for="">Title:</label>
                <input name="title" value="<?php echo htmlspecialchars($course->title); ?>" type="text" class="form-control" placeholder="Title" id="title">
                <small id="titleError" class="text-danger"></small>
            </div>
            <div class="mb-3">
                <label for="">Description:</label>
                <textarea name="description" type="text" class="form-control" placeholder="Description" id="description"><?php echo htmlspecialchars($course->description); ?></textarea>
                <small id="descriptionError" class="text-danger"></small>
            </div>
            <div class="mb-3">
                <label for="">Price:</label>
                <input name="price" value="<?php echo htmlspecialchars($course->price); ?>" type="number" class="form-control" placeholder="Price" id="price">
                <small id="priceError" class="text-danger"></small>
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" required id="category" name="category">
                    <option value="" disabled >Category...</option>
                    <?php if (!empty($categoryList)): ?>
                        <?php foreach ($categoryList as $category): ?>
                            <option value="<?php echo $category->id; ?>" 
                                    <?php if($category->id == $course->idCategory): ?> 
                                        selected 
                                    <?php endif; ?>>
                                <?php echo htmlspecialchars($category->name); ?>
                            </option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="0">No se cargaron las categorias</option>
                    <?php endif; ?>
                </select>
                <small id="categoryError" class="text-danger"></small>
            </div>
            <div class="mb-3">
                <label for="">Preview Image:</label>
                <div class="mb-3" id="previewImageWrapper">
                    <?php if (!empty($course->previewImage)): ?>
                        <button class="btn btn-secondary toggle-input-preview" data-target="previewImage">Image already uploaded. Click to change</button>
                        <input type="hidden" id="previewImageDeleted" value="false">
                    <?php else: ?>
                        <input type="file" id="previewImage" class="form-control" accept="image/*" name="previewImage">
                        <input type="hidden" id="previewImageDeleted" value="false">
                    <?php endif; ?>
                </div>
                <small id="imageError" class="text-danger"></small>
            </div>
            <div class="mb-3">
                <label for="">Preview Video:</label>
                <div class="mb-3" id="previewVideoWrapper">
                    <?php if (!empty($course->previewVideoPath)): ?>
                        <button class="btn btn-secondary toggle-input-preview" data-target="previewVideo">Video already uploaded. Click to change</button>
                        <input type="hidden" id="previewVideoDeleted" value="false">
                    <?php else: ?>
                        <input type="file" id="previewVideo" class="form-control" accept="video/*" name="previewVideo">
                        <input type="hidden" id="previewVideoDeleted" value="false">
                    <?php endif; ?>
                </div>
                <small id="videoError" class="text-danger"></small>
            </div>
        </div>
        <input type="hidden" id="courseId" name="courseId" value="<?php echo htmlspecialchars($course->id); ?>">
        <div class="levels">
            <h2>Levels</h2>
            <div id="levels-container">
            
            <?php if (!empty($course->levels)): ?>
                <?php $levelCount = 1; // Inicializamos la variable para contar los niveles ?>
                <?php foreach ($course->levels as $level): ?>
                    <div class="new-level bg-body-secondary" data-index="<?php echo $levelCount; ?>">
                        <h4>Level <?php echo $levelCount; ?></h4>
                        <div class="mb-3">
                            <label for="levelName<?php echo $levelCount; ?>">Name:</label>
                            <input value="<?php echo $level->title; ?>" type="text" id="levelName<?php echo $levelCount; ?>" class="form-control" placeholder="Title">
                            <small id="levelNameError<?php echo $levelCount; ?>" class="text-danger"></small>
                        </div>
                        <div class="mb-3">
                            <label for="levelDescription<?php echo $levelCount; ?>">Description:</label>
                            <textarea id="levelDescription<?php echo $levelCount; ?>" class="form-control" placeholder="Description"><?php echo $level->description; ?></textarea>
                            <small id="levelDescriptionError<?php echo $levelCount; ?>" class="text-danger"></small>
                        </div>
                        <div class="mb-3">
                            <label for="levelContent<?php echo $levelCount; ?>">Content:</label>
                            <div class="mb-3" id="levelContentWrapper<?php echo $levelCount; ?>">
                                <?php if (!empty($level->contentPath)): ?>
                                    <button class="btn btn-secondary toggle-input" data-target="levelContent<?php echo $levelCount; ?>">Video already uploaded. Click to change</button>
                                    <input type="hidden" id="levelContentDeleted<?php echo $levelCount; ?>" value="false">
                                <?php else: ?>
                                    <input type="file" id="levelContent<?php echo $levelCount; ?>" class="form-control" accept="video/*">
                                    <input type="hidden" id="levelContentDeleted<?php echo $levelCount; ?>" value="false">
                                <?php endif; ?>
                            </div>
                        </div>
                        <button type="button" class="btn btn-danger remove-level">Delete level</button>
                    </div>
                    <?php $levelCount++; // Incrementamos la variable en cada iteración ?>
                <?php endforeach; ?>
            <?php endif; ?>


            </div>
            <div id="loading" class="spinner-border text-primary" role="status" hidden>
                <span class="visually-hidden">Loading...</span>
            </div>
            <button class="btn btn-secondary" id="addLevelBtn">Add Level</button>
            <button class="btn btn-primary" id="createCourseBtn">Save changes</button>
        </div>

        </form>
    </div>
    <?php endif; ?>
</div>
<script src="../scripts/editCourse.js"></script>
<?php require 'partials/footer.php' ?>