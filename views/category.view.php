<?php require 'partials/head.php' ?>
<?php require "partials/nav.php" ?>
<div class="kardex">
    <h2>Categories</h2>
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCreateCat"><i class="bi bi-plus-lg"></i> Create category</button>
    <div class="category-list">
        <br>
    <table class="table table-striped table-hover">
            <thead class="">
                <tr>
                    <th scope="col">Category</th>
                    <th scope="col">Description</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <?php if (!empty($categoryList)): ?>
                <tbody>
                    <?php foreach ($categoryList as $category): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($category->name); ?></td>
                            <td><?php echo htmlspecialchars($category->description ?: ''); ?></td>
                            <td><?php echo htmlspecialchars($category->createdAt); ?></td>
                            <td><?php echo htmlspecialchars($category->deletedAt ?  'deleted' : 'active'); ?></td>
                            <td>
                                <a type="button" data-bs-toggle="modal" data-bs-target="#modalBan" data-id="<?php echo $category->id; ?>" data-action="ban"  class="btn btn-danger"><i class="bi bi-ban"></i></a>
                                <a type="button" 
                                class="btn btn-secondary"  
                                data-bs-toggle="modal" 
                                data-bs-target="#modalEditCat"  
                                data-id="<?php echo $category->id; ?>" 
                                data-name="<?php echo htmlspecialchars($category->name); ?>" 
                                data-description="<?php echo htmlspecialchars($category->description); ?>" 
                                data-action="edit"><i class="bi bi-three-dots"></i></a>
                            </td>
                            
                        </tr>
                    <?php endforeach; ?>
                    
                </tbody>
            <?php else: ?>
                <p>No hay usuarios disponibles.</p>
            <?php endif; ?>
        </table>
    </div>
</div>
<?php require 'partials/footer.php' ?>

<div class="modal fade" id="modalCreateCat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Create new category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm" method="POST">

            <div class="modal-body">
                <div class="mb-3">
                    <label for="" class="form-label">Category name:</label>
                    <input name="name" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Category description:</label>
                    <textarea name="description" class="form-control" id=""></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="action" value="create">Create</button>
            </div>
            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="modalEditCat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm" method="POST">

            <div class="modal-body">
                <div class="mb-3">
                    <label for="" class="form-label">Category name:</label>
                    <input type="text" class="form-control" name="name" value="Nombre">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Category description:</label>
                    <textarea class="form-control" name="description" id="">Descripcion</textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="hidden" name="categoryId" id="categoryIdEdit" />
                    <input type="hidden" name="action" id="actionEdit" value="edit" />
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <!-- <button type="submit" class="btn btn-primary">Edit</button> -->
            </div>
            </form>
            
        </div>
    </div>
</div>

<div class="modal fade" id="modalBan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Category?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this category?</p>
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
