<?php require 'partials/head.php' ?>
<?php require "partials/nav.php" ?>
<div class="kardex">
    <h2>Kardex</h2>
    <div class="kardex-filters">
        <div class="mb-3 kardex-select">
            <label for="" class="form-label">Category:</label>
            <select class="form-select" aria-label="Default select example">
                <option selected>Select</option>
                <option value="1">Development</option>
                <option value="2">Music</option>
                <option value="3">Bussiness</option>
            </select>
        </div>
        <div class="mb-3 kardex-select">
            <label for="">State:</label>
            <select class="form-select" aria-label="Default select example">
                <option selected>Select</option>
                <option value="1">Completed</option>
                <option value="2">In progress</option>
                <option value="3">Non started</option>
            </select>
        </div>
        <div class="mb-3 kardex-select">
            <label for="">Sort:</label>
            <select class="form-select" aria-label="Default select example">
                <option selected>Select</option>
                <option value="1">A-z</option>
                <option value="2">z-A</option>
                <option value="3">Progress</option>
                <option value="3">Last Time</option>
            </select>
        </div>
    </div>
    <div class="kadex-info">
        <table class="table table-striped table-hover">
            <thead class="">
                <tr>
                    <th scope="col">Course</th>
                    <th scope="col">Instructor</th>
                    <th scope="col">Progress</th>
                    <th scope="col">Inscription date</th>
                    <th scope="col">Last Entry date</th>
                    <th scope="col">Completion date</th>
                    <th scope="col">State</th>
                    <th scope="col">Category</th>
                    <th scope="col">Diploma</th>
                </tr>
            </thead>
            <?php if (!empty($kardexList)): ?>
                <tbody>
                    <?php foreach ($kardexList as $kardexLine): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($kardexLine->course); ?></td>
                            <td><?php echo htmlspecialchars($kardexLine->instructor); ?></td>
                            <td><?php echo htmlspecialchars($kardexLine->progress); ?>%</td>
                            <td><?php echo htmlspecialchars($kardexLine->enrolledAt); ?></td>
                            <td><?php echo htmlspecialchars($kardexLine->lastEntry ?: 'Not started'); ?></td>
                            <td><?php echo htmlspecialchars($kardexLine->endDate ?:'Does not Apply' ); ?></td>
                            <td><?php echo htmlspecialchars($kardexLine->status); ?></td>
                            <td><?php echo htmlspecialchars($kardexLine->category); ?></td>
                            <td><button class="btn btn-primary" onclick="window.location.assign('/diploma?id=<?php echo htmlspecialchars($kardexLine->id);?>')" <?php echo htmlspecialchars($kardexLine->progress == 100 ?:'disabled'); ?>>Get diploma</button></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            <?php endif; ?>
        </table>
    </div>
    <button class="btn btn-primary">Export to pdf</button>
</div>
<?php require 'partials/footer.php' ?>