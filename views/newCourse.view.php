<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/crearc.css"> 
    <style>
        .form-group {
            margin-bottom: 1rem;
        }
        .level-form {
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <img src="../../imagenes/SkillBloom_icon.png" alt="Logo" class="logo">
            <a href="dashboard.html">Cursos Disponibles</a>
            <a href="perfil.html">Perfil</a>
            <a href="mensajes.html">Mensajes</a>
            <div class="search-container">
                <form action="buscar_cursos.php" method="get">
                    <input type="text" name="query" placeholder="Buscar cursos...">
                    <button type="submit">Buscar</button>
                </form>
            </div>
            <a href="busqueda-avanzada.html" class="advanced-search-link">Búsqueda Avanzada</a>
        </nav>
    </header>

    <div class="course-form">
        <h2 class="title text-center">Crear Curso</h2>
        <form id="courseForm">
            <div class="form-group">
                <label for="title">Título del Curso</label>
                <input type="text" id="title" name="title"  required>
                <small id="titleError" class="text-danger"></small>
            </div>

            <div class="form-group">
                <label for="description">Descripción General</label>
                <textarea id="description" name="description"  rows="4" required></textarea>
                <small id="descriptionError" class="text-danger"></small>
            </div>

            <div class="form-group">
                <label for="cost">Costo del Curso</label>
                <input type="number" id="cost" name="cost"  step="0.01" required>
                <small id="costError" class="text-danger"></small>
            </div>

            <div class="form-group">
                <label for="image">Imagen del Curso</label>
                <input type="file" id="image" name="image"  accept="image/*" required>
                <small id="imageError" class="text-danger"></small>
            </div>

            <h3 class="title text-center">Niveles del Curso</h3>
            <div id="levelsContainer">
                <!-- Sección de niveles generada dinámicamente -->
                <div class="level-form">
                    <h4 class="title text-center">Nivel 1</h4>
                    <div class="form-group">
                        <label for="levelTitle1">Título del Nivel</label>
                        <input type="text" id="levelTitle1" name="levelTitle1" >
                        <small id="levelTitleError1" class="text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="levelDescription1">Descripción del Nivel</label>
                        <textarea id="levelDescription1" name="levelDescription1"  rows="3"></textarea>
                        <small id="levelDescriptionError1" class="text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="levelVideo1">Video del Nivel</label>
                        <input type="file" id="levelVideo1" name="levelVideo1"  accept="video/*" required>
                        <small id="levelVideoError1" class="text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="levelContent1">Contenido Adicional</label>
                        <input type="file" id="levelContent1" name="levelContent1"  accept=".pdf, image/*">
                    </div>
                </div>
            </div>

            <button type="button" id="addLevelButton" class="btn btn-secondary">Agregar Nivel</button>
            <button type="submit" >Crear Curso</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('courseForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Evita el envío tradicional del formulario

            let isValid = true;

            // Validaciones del formulario
            const title = document.getElementById('title').value;
            const description = document.getElementById('description').value;
            const cost = document.getElementById('cost').value;
            const image = document.getElementById('image').files.length;
            const titleError = document.getElementById('titleError');
            const descriptionError = document.getElementById('descriptionError');
            const costError = document.getElementById('costError');
            const imageError = document.getElementById('imageError');

            if (title.trim() === '') {
                titleError.textContent = 'El título del curso es obligatorio.';
                isValid = false;
            } else {
                titleError.textContent = '';
            }

            if (description.trim() === '') {
                descriptionError.textContent = 'La descripción del curso es obligatoria.';
                isValid = false;
            } else {
                descriptionError.textContent = '';
            }

            if (cost <= 0) {
                costError.textContent = 'El costo del curso debe ser un número positivo.';
                isValid = false;
            } else {
                costError.textContent = '';
            }

            if (image === 0) {
                imageError.textContent = 'La imagen del curso es obligatoria.';
                isValid = false;
            } else {
                imageError.textContent = '';
            }

            // Validación de niveles
            const levelForms = document.querySelectorAll('.level-form');
            levelForms.forEach((form, index) => {
                const levelTitle = form.querySelector(`#levelTitle${index + 1}`).value;
                const levelVideo = form.querySelector(`#levelVideo${index + 1}`).files.length;

                if (levelTitle.trim() === '') {
                    form.querySelector(`#levelTitle${index + 1}`).nextElementSibling.textContent = 'El título del nivel es obligatorio.';
                    isValid = false;
                } else {
                    form.querySelector(`#levelTitle${index + 1}`).nextElementSibling.textContent = '';
                }

                if (levelVideo === 0) {
                    form.querySelector(`#levelVideo${index + 1}`).nextElementSibling.textContent = 'El video del nivel es obligatorio.';
                    isValid = false;
                } else {
                    form.querySelector(`#levelVideo${index + 1}`).nextElementSibling.textContent = '';
                }
            });

            // Si todas las validaciones pasan, muestra el mensaje de éxito, limpia el formulario y redirige
            if (isValid) {
                alert('Curso creado con éxito');
                this.reset(); // Limpia el formulario
            }
        });

        // Agregar nuevo nivel
        document.getElementById('addLevelButton').addEventListener('click', function() {
            const levelsContainer = document.getElementById('levelsContainer');
            const levelCount = levelsContainer.children.length + 1;
            const newLevelForm = document.createElement('div');
            newLevelForm.classList.add('level-form');
            newLevelForm.innerHTML = `
                <h4 class="title text-center">Nivel ${levelCount}</h4>
                <div class="form-group">
                    <label for="levelTitle${levelCount}">Título del Nivel</label>
                    <input type="text" id="levelTitle${levelCount}" name="levelTitle${levelCount}" >
                    <small id="levelTitleError${levelCount}" class="text-danger"></small>
                </div>
                <div class="form-group">
                    <label for="levelDescription${levelCount}">Descripción del Nivel</label>
                    <textarea id="levelDescription${levelCount}" name="levelDescription${levelCount}"  rows="3"></textarea>
                    <small id="levelDescriptionError${levelCount}" class="text-danger"></small>
                </div>
                <div class="form-group">
                    <label for="levelVideo${levelCount}">Video del Nivel</label>
                    <input type="file" id="levelVideo${levelCount}" name="levelVideo${levelCount}"  accept="video/*" required>
                    <small id="levelVideoError${levelCount}" class="text-danger"></small>
                </div>
                <div class="form-group">
                    <label for="levelContent${levelCount}">Contenido Adicional</label>
                    <input type="file" id="levelContent${levelCount}" name="levelContent${levelCount}"  accept=".pdf, image/*">
                </div>
                <button type="button" class="btn btn-danger" onclick="removeLevel(this)">Eliminar Nivel</button>
            `;
            levelsContainer.appendChild(newLevelForm);
        });

        // Función para eliminar un nivel
        function removeLevel(button) {
            button.parentElement.remove();
        }
    </script>
</body>
</html>
