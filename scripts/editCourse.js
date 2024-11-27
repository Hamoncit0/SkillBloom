document.addEventListener('DOMContentLoaded', function () {
    let levelCount = 0;
    function checkLevels() {
        const levelsContainer = document.getElementById('levels-container');
        const levels = levelsContainer.querySelectorAll('.new-level');
    
        if (levels.length === 0) {
            levelsContainer.innerHTML = `<p class="text-muted">No levels added yet. Click "Add Level" to start creating levels.</p>`;
        } else {
            levelCount = levels.length;
    
            // Eliminar mensaje si hay niveles
            const noLevelsMessage = levelsContainer.querySelector('.text-muted');
            if (noLevelsMessage) {
                noLevelsMessage.remove();
            }
    
            // Asignar funcionalidad a los botones de eliminar de cada nivel existente
            levels.forEach((level, index) => {
                const deleteButton = level.querySelector('.remove-level');
    
                // Asegurarse de no duplicar eventos en el botón
                if (!deleteButton.dataset.bound) {
                    deleteButton.addEventListener('click', function (e) {
                        e.preventDefault(); // Prevenir comportamiento predeterminado
                        level.remove(); // Eliminar el nivel del DOM
                        updateLevelIds(); // Actualizar los índices de los niveles
                        checkLevels(); // Verificar si quedan niveles
                    });
    
                    // Marcar el botón como ya enlazado
                    deleteButton.dataset.bound = true;
                }
            });
        }
    }
    
    function updateLevelIds() {
        const levels = document.querySelectorAll('.new-level');
    
        levels.forEach((level, index) => {
            const newIndex = index + 1; // Nuevo índice basado en la posición actual del nivel
    
            // Actualizar título del nivel
            level.querySelector('h4').textContent = `Level ${newIndex}`;
    
            // Actualizar IDs de los elementos dentro del nivel
            const levelName = level.querySelector('input[type="text"]');
            const levelDescription = level.querySelector('textarea');
            const levelContent = level.querySelector('input[type="file"]');
            const levelNameError = level.querySelector('.text-danger:nth-of-type(1)');
            const levelDescriptionError = level.querySelector('.text-danger:nth-of-type(2)');
            const levelContentError = level.querySelector('.text-danger:nth-of-type(3)');
    
            // Cambiar los IDs usando el nuevo índice
            if (levelName) levelName.id = `levelName${newIndex}`;
            if (levelDescription) levelDescription.id = `levelDescription${newIndex}`;
            if (levelContent) levelContent.id = `levelContent${newIndex}`;
            if (levelNameError) levelNameError.id = `levelNameError${newIndex}`;
            if (levelDescriptionError) levelDescriptionError.id = `levelDescriptionError${newIndex}`;
            if (levelContentError) levelContentError.id = `levelContentError${newIndex}`;
    
            // Actualizar dataset.index
            level.dataset.index = newIndex;
        });
    
        // Actualizar el contador global
        levelCount = levels.length;
    }

    function addLevel() {
        levelCount++;
        const levelDiv = document.createElement('div');
        levelDiv.className = 'new-level bg-body-secondary';
        levelDiv.dataset.index = levelCount; // Agrega un atributo para el índice del nivel
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
                <input type="file" id="levelContent${levelCount}" accept="video/*" class="form-control">
                <small id="levelContentError${levelCount}" class="text-danger"></small>
            </div>
            <button class="btn btn-danger remove-level">Delete level</button>
        `;
        document.getElementById('levels-container').appendChild(levelDiv);

        // Agregar funcionalidad para eliminar el nivel
        levelDiv.querySelector('.remove-level').addEventListener('click', function () {
            levelDiv.remove();
            updateLevelIds();
        });
    }

    document.getElementById('addLevelBtn').addEventListener('click', function (e) {
        e.preventDefault();
        addLevel();
    });

    // Chequear niveles al cargar la página
    checkLevels();

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


    document.getElementById('createCourse').addEventListener('submit', async function (event) {
        event.preventDefault();

        if (1==1) {
            const formData = new FormData(this);
            const course = {
                title: formData.get('title'),
                description: formData.get('description'),
                idCategory: formData.get('category'),
                price: formData.get('price'),
            };
    
            const levels = [];
            for (let i = 1; i <= levelCount; i++) {
                const levelName = document.getElementById(`levelName${i}`).value;
                const levelDescription = document.getElementById(`levelDescription${i}`).value;
                const levelContentFile = document.getElementById(`levelContent${i}`)?.files[0];
                const levelContentDeleted = document.getElementById(`levelContent${i}Deleted`)?.value === 'true';
    
                levels.push({
                    name: levelName,
                    description: levelDescription,
                    content: levelContentFile || null, // Adjuntar archivo si existe
                    contentStatus: levelContentDeleted
                        ? 'deleted'
                        : levelContentFile
                        ? 'updated'
                        : 'unchanged',
                });
            }

            const previewImageFile = document.getElementById('previewImage')?.files[0];
            const previewVideoFile = document.getElementById('previewVideo')?.files[0];
    
            // Convertir imagen a base64 si existe
            let previewImageBase64 = null;
            if (previewImageFile) {
                previewImageBase64 = await convertFileToBase64(previewImageFile);
            }

            // Preparar los datos finales para enviar
            const fullData = new FormData();
            fullData.append('course', JSON.stringify(course));
            // Agregar estado de la previewImage
            if (previewImageFile) {
                fullData.append('previewImageStatus', 'updated');
                fullData.append('previewImage', previewImageBase64);
            } else {
                fullData.append('previewImageStatus', 'unchanged');
            }
            
            // Agregar estado del previewVideo
            if (previewVideoFile) {
                fullData.append('previewVideoStatus', 'updated');
                fullData.append('previewVideo', previewVideoFile);
            } else {
                fullData.append('previewVideoStatus', 'unchanged');
            }

    
                    // Adjuntar niveles
                    levels.forEach((level, index) => {
                        fullData.append(`levels[${index}][name]`, level.name);
                        fullData.append(`levels[${index}][description]`, level.description);
                        fullData.append(`levels[${index}][contentStatus]`, level.contentStatus);
                        if (level.content) {
                            fullData.append(`levels[${index}][content]`, level.content);
                        }
                    });

                    courseId = parseInt(document.getElementById('courseId').value);
                    // Enviar el formulario
                    document.getElementById('loading').removeAttribute('hidden');
                    fetch(`/editCourse?id=${courseId}`, {
                        method: 'POST',
                        body: fullData,
                    })
                        .then(response => response.json())
                        .then(data => {
                            alert('Course edited successfully!');
                            console.log(data);
                            document.getElementById('loading').setAttribute('hidden', 'true');
                            window.location.assign('/');
                        })
                        .catch(error => {
                            alert('An error occurred.');
                            console.error(error);
                            document.getElementById('loading').setAttribute('hidden', 'true');
                        });
        } else {
            document.getElementById('loading').setAttribute('hidden');
            alert('Please fill out all required fields.');
        }
    });

        // Manejar el cambio de botón a input file
     document.querySelectorAll('.toggle-input').forEach(button => {
         button.addEventListener('click', function () {
             const targetId = this.getAttribute('data-target');
             const wrapper = this.parentElement;

             // Reemplaza el botón con un input file y marca el contenido como eliminado
             wrapper.innerHTML = `
                 <input type="file" id="${targetId}" class="form-control" accept="video/*">
                 <input type="hidden" id="${targetId}Deleted" value="true">
             `;
         });
    });

    const previewButton = document.querySelector('.toggle-input-preview');
    if (previewButton) {
        previewButton.addEventListener('click', function () {
            const targetId = this.getAttribute('data-target');
            const wrapper = this.parentElement;

            // Reemplaza el botón con un input file y marca el contenido como eliminado
            wrapper.innerHTML = `
                <input type="file" id="${targetId}" class="form-control" accept="image/*">
                <input type="hidden" id="${targetId}Deleted" value="true">
            `;
        });
    }
    // Manejar el cambio de botón a input file para previewImage
    const previewButtons = document.querySelectorAll('.toggle-input-preview');
    previewButtons.forEach(button => {
        button.addEventListener('click', function () {
            const targetId = this.getAttribute('data-target');
            const wrapper = this.parentElement;

            // Reemplaza el botón con un input file y marca el contenido como eliminado
            wrapper.innerHTML = `
                <input type="file" id="${targetId}" class="form-control" accept="video/*">
                <input type="hidden" id="${targetId}Deleted" value="true">
            `;
        });
    });

    
    // Función para convertir archivo a base64
    function convertFileToBase64(file) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.onload = () => resolve(reader.result.split(',')[1]); // Extraer solo la base64
            reader.onerror = (error) => reject(error);
            reader.readAsDataURL(file);
        });
    }
});
