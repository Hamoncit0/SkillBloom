document.addEventListener('DOMContentLoaded', function () {
    let levelCount = 0;
    addLevel();
    addLevel();
    function addLevel() {
        levelCount++;
        const levelDiv = document.createElement('div');
        levelDiv.className = 'new-level bg-body-secondary';
        levelDiv.innerHTML = `
            <h4>Level ${levelCount}</h4>
            <div class="mb-3">
                <label for="levelName${levelCount}">Name:</label>
                <input type="text" id="levelName${levelCount}" class="form-control" placeholder="Title">
                <small id="levelNameError${levelCount}" class="text-danger"></small>
            </div>
            <div class="mb-3">
                <label for="levelDescription${levelCount}">Description:</label>
                <textarea id="levelDescription${levelCount}" class="form-control" placeholder="Description"></textarea>
                <small id="levelDescriptionError${levelCount}" class="text-danger"></small>
            </div>
            <div class="mb-3">
                <label for="levelContent${levelCount}">Content:</label>
                <input type="file" id="levelContent${levelCount}" class="form-control">
                <small id="levelContentError${levelCount}" class="text-danger"></small>
            </div>
            <button class="btn btn-danger remove-level">Delete level</button>
        `;
        document.getElementById('levels-container').appendChild(levelDiv);

        // Add delete functionality
        levelDiv.querySelector('.remove-level').addEventListener('click', function () {
            levelDiv.remove();
            levelCount--;
        });
    }

    document.getElementById('addLevelBtn').addEventListener('click', addLevel);

    function validateForm() {
        let isValid = true;

        // Validate course title
        const title = document.getElementById('title').value;
        const titleError = document.getElementById('titleError');
        if (!title) {
            titleError.textContent = 'Title is required';
            isValid = false;
        } else {
            titleError.textContent = '';
        }

        // Validate description
        const description = document.getElementById('description').value;
        const descriptionError = document.getElementById('descriptionError');
        if (!description) {
            descriptionError.textContent = 'Description is required';
            isValid = false;
        } else {
            descriptionError.textContent = '';
        }

        // Validate price
        const price = document.getElementById('price').value;
        const priceError = document.getElementById('priceError');
        if (!price) {
            priceError.textContent = 'Price is required';
            isValid = false;
        } else {
            priceError.textContent = '';
        }

        // Validate category
        const category = document.getElementById('category').value;
        const categoryError = document.getElementById('categoryError');
        if (!category) {
            categoryError.textContent = 'Category is required';
            isValid = false;
        } else {
            categoryError.textContent = '';
        }
        //Validar archivos de imagen y video
        const imageInput = document.getElementById('previewImage');
        const imageError = document.getElementById('imageError');
        const imageFile = imageInput.files[0];
        if (!imageFile) {
            imageError.textContent = "Please upload an image.";
            isValid = false;
        }

        //checar tipo de archivo
        try{
            const validImageTypes = ["image/jpeg", "image/png", "image/gif"];
            if (!validImageTypes.includes(imageFile.type)) {
                imageError.textContent = "Only image files (JPEG, PNG, GIF) are allowed.";
                isValid = false;
            }
            else{
                imageError.textContent = "";
            }

        }catch{

        }

        const videoInput = document.getElementById('previewVideo');
        const videoError = document.getElementById('videoError');
        const videoFile = videoInput.files[0];
        if (!videoFile) {
            videoError.textContent = "Please upload a video.";
            isValid = false;
        }
        try{
            const validVideoTypes = ["video/mp4", "video/webm", "video/ogg"];
            if (!validVideoTypes.includes(videoFile.type)) {
                videoError.textContent = "Only video files (MP4, WEBM, OGG) are allowed.";
                isValid = false;
            }
            else{
                videoError.textContent = "";

            }
        }
        catch{

        }

        // Check if there is at least one level
        const levelsContainer = document.getElementById('levels-container');
        const levelsError = document.getElementById('levelsError');
        if (levelCount === 0) {
            if (!levelsError) {
                const errorMsg = document.createElement('small');
                errorMsg.id = 'levelsError';
                errorMsg.className = 'text-danger';
                errorMsg.textContent = 'At least one level is required';
                levelsContainer.parentNode.insertBefore(errorMsg, levelsContainer.nextSibling);
            }
            isValid = false;
        } else if (levelsError) {
            levelsError.remove(); // Remove error if levels exist
        }

        // Validate each level
        for (let i = 1; i <= levelCount; i++) {
            const levelName = document.getElementById(`levelName${i}`).value;
            const levelNameError = document.getElementById(`levelNameError${i}`);
            if (!levelName) {
                levelNameError.textContent = 'Level name is required';
                isValid = false;
            } else {
                levelNameError.textContent = '';
            }

            const levelDescription = document.getElementById(`levelDescription${i}`).value;
            const levelDescriptionError = document.getElementById(`levelDescriptionError${i}`);
            if (!levelDescription) {
                levelDescriptionError.textContent = 'Level description is required';
                isValid = false;
            } else {
                levelDescriptionError.textContent = '';
            }

            const levelContent = document.getElementById(`levelContent${i}`).value;
            const levelContentError = document.getElementById(`levelContentError${i}`);
            if (!levelContent) {
                levelContentError.textContent = 'Level content is required';
                isValid = false;
            } else {
                levelContentError.textContent = '';
            }
        }

        return isValid;
    }

    document.getElementById('createCourseBtn').addEventListener('click', function (event) {
        event.preventDefault();

        if (validateForm()) {
            alert('Course edited successfully!');
            // Clear form after submission
            document.querySelectorAll('.form-control').forEach(input => input.value = '');
            document.querySelectorAll('.text-danger').forEach(error => error.textContent = '');
            document.getElementById('levels-container').innerHTML = ''; // Remove all levels
            levelCount = 0; // Reset level count
        } else {
            alert('Please fill out all required fields.');
        }
    });
});
