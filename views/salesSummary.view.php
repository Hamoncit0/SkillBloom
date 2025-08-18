<?php require 'partials/head.php' ?>
<?php require "partials/nav.php" ?>
<div class="kardex">
    <h2>Sales Summary</h2>
    <div class="kardex-filters">
        <form id="sort-form" method="GET" action="">
            <div class="mb-3 kardex-select">
                <label for="sort-select">Sort:</label>
                <select class="form-select" id="sort-select" name="sort" onchange="document.getElementById('sort-form').submit();">
                    <option value="" selected>Select</option>
                    <option value="1" <?php echo isset($_GET['sort']) && $_GET['sort'] == '1' ? 'selected' : ''; ?>>A-z</option>
                    <option value="2" <?php echo isset($_GET['sort']) && $_GET['sort'] == '2' ? 'selected' : ''; ?>>z-A</option>
                    <option value="3" <?php echo isset($_GET['sort']) && $_GET['sort'] == '3' ? 'selected' : ''; ?>>Students</option>
                    <option value="4" <?php echo isset($_GET['sort']) && $_GET['sort'] == '4' ? 'selected' : ''; ?>>Incomes</option>
                    <option value="5" <?php echo isset($_GET['sort']) && $_GET['sort'] == '5' ? 'selected' : ''; ?>>Review score</option>
                </select>
            </div>
        </form>
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