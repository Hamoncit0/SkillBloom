<?php require 'partials/head.php' ?>
<?php require "partials/nav.php" ?>
<?php
    // Función para mapear el valor de género
    function mapRol($rol) {
        switch ($rol) {
            case 1:
                return 'Administrator';
            case 2:
                return 'Instructor';
            case 3:
                return 'Student';
            default:
                return 'No especificado'; // Para manejar valores inesperados
        }
    }
    ?>
<div class="user-list ">
    <h2>User List</h2>
    <form method="GET"> <!-- Cambié el formulario para enviar los datos con GET -->
        <div class="kardex-filters">
            <div class="mb-3 kardex-select">
                <label for="" class="form-label">Status:</label>
                <select name="status" class="form-select" aria-label="Default select example">
                    <option value="">Select</option>
                    <option value="active" <?php echo isset($_GET['status']) && $_GET['status'] == 'active' ? 'selected' : ''; ?>>Active</option>
                    <option value="inactive" <?php echo isset($_GET['status']) && $_GET['status'] == 'inactive' ? 'selected' : ''; ?>>Inactive</option>
                    <option value="blocked" <?php echo isset($_GET['status']) && $_GET['status'] == 'blocked' ? 'selected' : ''; ?>>Blocked</option>
                </select>
            </div>
            <div class="mb-3 kardex-select">
                <label for="">Rol:</label>
                <select name="role" class="form-select" aria-label="Default select example">
                    <option value="">Select</option>
                    <option value="1" <?php echo isset($_GET['role']) && $_GET['role'] == 1 ? 'selected' : ''; ?>>Student</option>
                    <option value="2" <?php echo isset($_GET['role']) && $_GET['role'] == 2 ? 'selected' : ''; ?>>Administrator</option>
                    <option value="3" <?php echo isset($_GET['role']) && $_GET['role'] == 3 ? 'selected' : ''; ?>>Instructor</option>
                </select>
            </div>
            <div class="mb-3 kardex-select">
                <label for="">Sort:</label>
                <select name="sort" class="form-select" aria-label="Default select example">
                    <option value="">Select</option>
                    <option value="1" <?php echo isset($_GET['sort']) && $_GET['sort'] == '1' ? 'selected' : ''; ?>>A-z</option>
                    <option value="2" <?php echo isset($_GET['sort']) && $_GET['sort'] == '2' ? 'selected' : ''; ?>>z-A</option>
                    <option value="3" <?php echo isset($_GET['sort']) && $_GET['sort'] == '3' ? 'selected' : ''; ?>>Last Entry Date</option>
                </select>
            </div>
            <div class="mb-3 kardex-select">
                <label for="" style="width:100%; margin-right: -20px">Search by email:</label>
                <input type="text" name="email" class="form-control" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>">
            </div>
            <div class="mb-3 kardex-select">  
              <button type="submit" class="btn btn-primary">Apply Filters</button>
            </div>
        </div>
    </form>
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
            <?php if (!empty($usersList)): ?>
            <tbody>
              <?php foreach ($usersList as $user): ?>
                  <tr>
                      <td><?php echo htmlspecialchars($user->email); ?></td>
                      <td><?php echo htmlspecialchars($user->status); ?></td>
                      <td><?php echo htmlspecialchars($user->createdAt); ?></td>
                      <td><?php echo htmlspecialchars($user->updatedAt ?: 'none'); ?></td>
                      <td><?php echo htmlspecialchars(mapRol($user->idRol)); ?></td>
                      <td>
                          <a type="button" data-bs-toggle="modal" data-bs-target="#modalBan" data-id="<?php echo $user->id; ?>" data-action="ban" class="btn btn-danger" style="margin-right: 10px"><i class="bi bi-ban"></i></a>
                          <a type="button" data-bs-toggle="modal" data-bs-target="#modalUnban" data-id="<?php echo $user->id; ?>" data-action="unban"  class="btn btn-success"><i class="bi bi-check-circle"></i></a>
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
        <form id="banForm" method="POST">
            <input type="hidden" name="userId" id="userId" />
            <input type="hidden" name="action" id="action" value="ban" />
            <button type="submit" class="btn btn-primary">Yes, continue</button>
        </form>
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
        <form id="unbanForm" method="POST">
            <input type="hidden" name="userId" id="userIdUnban" />
            <input type="hidden" name="action" id="actionUnban" value="unban" />
            <button type="submit" class="btn btn-primary">Yes, continue</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
    // Para capturar el evento de clic y rellenar el formulario
    var banButtons = document.querySelectorAll('[data-bs-toggle="modal"]');
    banButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var userId = this.getAttribute('data-id'); // Obtener el ID del usuario
            var action = this.getAttribute('data-action'); // Obtener la acción (ban/unban)

            if (action === "ban") {
                document.getElementById('userId').value = userId; // Rellenar el ID en el formulario de ban
                document.getElementById('action').value = action; // Rellenar la acción de ban
            } else if (action === "unban") {
                document.getElementById('userIdUnban').value = userId; // Rellenar el ID en el formulario de unban
                document.getElementById('actionUnban').value = action; // Rellenar la acción de unban
            }
        });
    });
</script>
