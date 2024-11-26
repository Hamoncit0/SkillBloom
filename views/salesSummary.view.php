<?php require 'partials/head.php' ?>
<?php require "partials/nav.php" ?>
<div class="kardex">
    <h2>Sales Summary</h2>
    <div class="kardex-filters">
        
        <div class="mb-3 kardex-select">
            <label for="">Sort:</label>
            <select class="form-select" aria-label="Default select example">
                <option selected>Select</option>
                <option value="1">A-z</option>
                <option value="2">z-A</option>
                <option value="3">Students</option>
                <option value="3">Incomes</option>
                <option value="3">Review score</option>
            </select>
        </div>
    </div>
    <div class="kadex-info">
        <table class="table table-striped table-hover">
            <thead class="">
                <tr>
                    <th scope="col">Course</th>
                    <th scope="col">Enrolled students</th>
                    <th scope="col">Review Score</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total incomes this month</th>
                    <th scope="col">Total incomes</th>
                </tr>
            </thead>
            <tbody>
                
            <?php if (!empty($sales)): ?>
                <?php foreach ($sales as $sale): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($sale->course); ?></td>
                        <td><?php echo htmlspecialchars($sale->students); ?></td>
                        <td>
                            <?php 
                            echo $sale->rating 
                                ? htmlspecialchars(number_format($sale->rating, $sale->rating == floor($sale->rating) ? 0 : 1)) . ' <i class="bi bi-star-fill"></i>' 
                                : 'No reviews'; 
                            ?>
                        </td>
                        <td>MX $<?php echo htmlspecialchars($sale->price); ?></td>
                        <td>MX $<?php echo htmlspecialchars($sale->month); ?></td>
                        <td>MX $<?php echo htmlspecialchars($sale->total); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay usuarios disponibles.</p>
            <?php endif; ?>
                
            </tbody>
        </table>
    </div>
    <button class="btn btn-primary">Export to pdf</button>
</div>
<?php require 'partials/footer.php' ?>