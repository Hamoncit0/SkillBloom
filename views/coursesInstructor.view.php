<?php require 'partials/head.php' ?>
<?php require "partials/nav.php" ?>
<div class="user-list">
    <h2>My Course List</h2>
    <div class="kardex-filters">
        <div class="mb-3 kardex-select">
            <label for="" class="form-label">Status:</label>
            <select class="form-select" aria-label="Default select example">
                <option selected>Select</option>
                <option value="1">Active</option>
                <option value="2">Inactive</option>
                <option value="3">Blocked</option>
            </select>
        </div>
        <div class="mb-3 kardex-select">
            <label for="">Rol:</label>
            <select class="form-select" aria-label="Default select example">
                <option selected>Select</option>
                <option value="1">Student</option>
                <option value="2">Administrator</option>
                <option value="3">Instructor</option>
            </select>
        </div>
        <div class="mb-3 kardex-select">
            <label for="">Sort:</label>
            <select class="form-select" aria-label="Default select example">
                <option selected>Select</option>
                <option value="1">A-z</option>
                <option value="2">z-A</option>
                <option value="3">Last Entry Date</option>
            </select>
        </div>
        <div class="mb-3 kardex-select">
            <label for="" style="width:100%; margin-right: -20px">Search by email:</label>
            <input type="text" class="form-control">
        </div>
    </div>
    <div class="user-list-table">
        <table class="table table-striped table-hover">
            <thead class="">
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Created By</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <?php if (!empty($courseList)): ?>
                <tbody>
                    <?php foreach ($courseList as $course): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($course->title); ?></td>
                            <td><?php echo htmlspecialchars($course->deletedAt ?  'deleted' : 'active'); ?></td>
                            <td><?php echo htmlspecialchars($course->createdAt); ?></td>
                            <td><?php echo htmlspecialchars($course->instructor); ?></td>
                            <td>
                                <a type="button" data-bs-toggle="modal" data-bs-target="#modalBan" data-id="<?php echo $course->id; ?>" data-action="ban"   class="btn btn-danger"><i class="bi bi-trash3"></i></a>
                                <a type="button" href="editCourse?id=<?php echo htmlspecialchars($course->id); ?>" class="btn btn-primary"><i class="bi bi-pencil"></i></a>
                                <a type="button" href="courseStadistics?id=<?php echo htmlspecialchars($course->id); ?>" class="btn btn-secondary"><i class="bi bi-three-dots"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            <?php endif; ?>
        </table>
    </div>
</div>
<?php require 'partials/footer.php' ?>

<div class="modal fade" id="modalBan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Course?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this course?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <form id="banForm" method="POST">
            <input type="hidden" name="categoryId" id="categoryId" />
            <input type="hidden" name="action" id="action" value="ban" />
            <button type="submit" class="btn btn-primary">Yes, continue</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
     // Capturar el evento de clic en los botones de edición
     var editButtons = document.querySelectorAll('[data-action="edit"]');
    editButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var categoryId = this.getAttribute('data-id'); // ID de la categoría
            var categoryName = this.getAttribute('data-name'); // Nombre de la categoría
            var categoryDescription = this.getAttribute('data-description'); // Descripción de la categoría

            // Rellenar los campos del modal de edición
            document.querySelector('#modalEditCat input[name="name"]').value = categoryName;
            document.querySelector('#modalEditCat textarea[name="description"]').value = categoryDescription;
            document.querySelector('#modalEditCat input[name="categoryId"]').value = categoryId;
        });
    });
    
    // Para capturar el evento de clic y rellenar el formulario
    var banButtons = document.querySelectorAll('[data-bs-toggle="modal"]');
    banButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var categoryId = this.getAttribute('data-id'); // Obtener el ID del usuario
            var action = this.getAttribute('data-action'); // Obtener la acción (ban/unban)

            if (action === "ban") {
                document.getElementById('categoryId').value = categoryId; // Rellenar el ID en el formulario de ban
                document.getElementById('action').value = action; // Rellenar la acción de ban
            } else if (action === "edit") {
                document.getElementById('categoryIdEdit').value = categoryId; // Rellenar el ID en el formulario de unban
            }
        });
    });
</script>
