<?php require 'partials/head.php' ?>
<?php require "partials/nav.php" ?>
<div class="user-list bg-light">
    <h2>User List</h2>
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
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Last Entry date</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>gandalf@gmail.com</td>
                    <td>Active</td>
                    <td>05/06/2024</td>
                    <td>18/09/2024</td>
                    <td>Instructor</td>
                    <td>
                        <a type="button" data-bs-toggle="modal" data-bs-target="#modalBan"  class="btn btn-danger" style="margin-right: 10px"><i class="bi bi-ban"></i></a>
                        <a type="button" data-bs-toggle="modal" data-bs-target="#modalUnban"  class="btn btn-success"><i class="bi bi-check-circle"></i></a>
                    </td>
                    
                </tr>
                <tr>
                    <td>frodo@gmail.com</td>
                    <td>Active</td>
                    <td>05/06/2024</td>
                    <td>18/09/2024</td>
                    <td>Student</td>
                    <td><a class="btn btn-danger" style="margin-right: 10px"><i class="bi bi-ban"></i></a><a class="btn btn-success"><i class="bi bi-check-circle"></i></a></td>
                </tr>
                <tr>
                    <td>galadriel@gmail.com</td>
                    <td>Active</td>
                    <td>05/06/2024</td>
                    <td>18/09/2024</td>
                    <td>Administrator</td>
                    <td><a class="btn btn-danger" style="margin-right: 10px"><i class="bi bi-ban"></i></a><a class="btn btn-success"><i class="bi bi-check-circle"></i></a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php require 'partials/footer.php' ?>

<div class="modal fade" id="modalBan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Ban User?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to ban this user?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary">Yes, continue</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalUnban" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Unban User?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to unban this user?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary">Yes, continue</button>
      </div>
    </div>
  </div>
</div>
