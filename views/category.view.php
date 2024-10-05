<?php require 'partials/head.php' ?>
<?php require "partials/nav.php" ?>
<div class="kardex bg-light">
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
                    <th scope="col">Created By</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Development</td>
                    <td>Computer Science related</td>
                    <td>05/06/2024</td>
                    <td>Sauron</td>
                    <td>
                        <a type="button" data-bs-toggle="modal" data-bs-target="#modalBan"  class="btn btn-danger"><i class="bi bi-ban"></i></a>
                        <a type="button" class="btn btn-secondary"  data-bs-toggle="modal" data-bs-target="#modalEditCat"><i class="bi bi-three-dots"></i></a>
                    </td>
                    
                </tr>
                <tr>
                    <td>Development</td>
                    <td>Computer Science related</td>
                    <td>05/06/2024</td>
                    <td>Sauron</td>
                    <td>
                        <a type="button" data-bs-toggle="modal" data-bs-target="#modalBan"  class="btn btn-danger"><i class="bi bi-ban"></i></a>
                        <a type="button" href="courseAdmin" class="btn btn-secondary"><i class="bi bi-three-dots"></i></a>
                    </td>
                    
                </tr>
                <tr>
                    <td>Development</td>
                    <td>Computer Science related</td>
                    <td>05/06/2024</td>
                    <td>Sauron</td>
                    <td>
                        <a type="button" data-bs-toggle="modal" data-bs-target="#modalBan"  class="btn btn-danger"><i class="bi bi-ban"></i></a>
                        <a type="button" href="courseAdmin" class="btn btn-secondary"><i class="bi bi-three-dots"></i></a>
                    </td>
                    
                </tr>
                
            </tbody>
        </table>
    </div>
</div>
<?php require 'partials/footer.php' ?>

<div class="modal fade" id="modalCreateCat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <form action="">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Create new category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label for="" class="form-label">Category name:</label>
                    <input type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Category description:</label>
                    <textarea name="" class="form-control" id=""></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>

        </div>
    </div>
    </form>
</div>

<div class="modal fade" id="modalEditCat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <form action="">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label for="" class="form-label">Category name:</label>
                    <input type="text" class="form-control" value="Nombre">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Category description:</label>
                    <textarea name="" class="form-control" id="">Descripcion</textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
            
        </div>
    </div>
    </form>
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
        <button type="button" class="btn btn-primary">Yes, continue</button>
      </div>
    </div>
  </div>
</div>
