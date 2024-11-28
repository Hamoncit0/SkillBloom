<?php require 'partials/head.php' ?>
<?php require "partials/nav.php" ?>
<div class="kardex ">
    <h2>Students Per Course</h2>
    <div class="kardex-filters">
        <form id="filter-form" method="GET" action="" class="d-flex align-items-center">
            <!-- Filtro por curso -->
            <div class="mb-3 kardex-select">
                <label for="course-select" class="form-label">Course:</label>
                <select class="form-select" id="course-select" name="course">
                    <option value="" selected>Select</option>
                    <?php if (!empty($courses)): ?>
                        <?php foreach ($courses as $course): ?>
                            <option value="<?php echo $course->id; ?>">
                                <?php echo htmlspecialchars($course->title); ?>
                            </option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="0">No se cargaron las categorías</option>
                    <?php endif; ?>
                </select>
            </div>

            <!-- Filtro por estado -->
            <div class="mb-3 kardex-select">
                <label for="state-select" class="form-label">State:</label>
                <select class="form-select" id="state-select" name="state">
                    <option value="" selected>Select</option>
                    <option value="finished">Finished</option>
                    <option value="in progress">In progress</option>
                    <option value="uninitiated">Non started</option>
                </select>
            </div>

            <!-- Ordenar por -->
            <div class="mb-3 kardex-select">
                <label for="sort-select" class="form-label">Sort:</label>
                <select class="form-select" id="sort-select" name="sort">
                    <option value="" selected>Select</option>
                    <option value="1">A-z</option>
                    <option value="2">z-A</option>
                    <option value="3">Progress</option>
                    <option value="4">Last Time</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary mb-3 ms-2">Filter</button>
        </form>
    </div>

    <div class="kadex-info">
        <table class="table table-striped table-hover">
            <thead class="">
                <tr>
                    <th scope="col">Student Name</th>
                    <th scope="col">Course</th>
                    <th scope="col">Progress</th>
                    <th scope="col">Inscription date</th>
                    <th scope="col">Last Entry</th>
                    <th scope="col">State</th>
                    <th scope="col">Paid amount</th>
                    <th scope="col">Payment Method</th>
                </tr>
            </thead>
            <?php if (!empty($studentsPerCourse)): ?>
            <tbody>
            <?php foreach ($studentsPerCourse as $course): ?>
                <tr>
                    <td><?php echo htmlspecialchars($course->name); ?></td>
                    <td><?php echo htmlspecialchars($course->course); ?></td>
                    <td><?php echo htmlspecialchars($course->progress); ?>%</td>
                    <td><?php echo htmlspecialchars($course->inscriptionDate); ?></td>
                    <td><?php echo htmlspecialchars($course->lastEntry ?: 'Not started'); ?></td>
                    <td><?php echo htmlspecialchars($course->state); ?></td>
                    <td>MX $<?php echo htmlspecialchars($course->total); ?></td>
                    <td><?php echo htmlspecialchars($course->paymentMethod); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
          <?php else: ?>
              <p>No hay usuarios disponibles.</p>
          <?php endif; ?>
        </table>
    </div>
    <button class="btn btn-primary">Export to pdf</button>
</div>
<?php require 'partials/footer.php' ?>