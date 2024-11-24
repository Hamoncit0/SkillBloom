<?php require 'partials/head.php' ?>
<?php require "partials/nav.php" ?>
<div class="kardex ">
    <h2>Students Per Course</h2>
    <div class="kardex-filters">
        <div class="mb-3 kardex-select">
            <label for="" class="form-label">Course:</label>
            <select class="form-select" aria-label="Default select example">
                <option selected>Select</option>
                <option value="1">JavaScript</option>
                <option value="2">Python</option>
                <option value="3">C#</option>
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
                    <th scope="col">Student Name</th>
                    <th scope="col">Course</th>
                    <th scope="col">Progress</th>
                    <th scope="col">Inscription date</th>
                    <th scope="col">State</th>
                    <th scope="col">Paid amount</th>
                    <th scope="col">Payment Method</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Gandalf</td>
                    <td>Javascript the final course</td>
                    <td>75%</td>
                    <td>05/06/2024</td>
                    <td>In progress</td>
                    <td>MX $500.0</td>
                    <td>Paypal</td>
                </tr>
                <tr>
                    <td>Gandalf</td>
                    <td>Javascript the final course</td>
                    <td>75%</td>
                    <td>05/06/2024</td>
                    <td>In progress</td>
                    <td>MX $500.0</td>
                    <td>Paypal</td>
                </tr>
                <tr>
                    <td>Gandalf</td>
                    <td>Javascript the final course</td>
                    <td>75%</td>
                    <td>05/06/2024</td>
                    <td>In progress</td>
                    <td>MX $500.0</td>
                    <td>Paypal</td>
                </tr>
                
            </tbody>
        </table>
    </div>
    <button class="btn btn-primary">Export to pdf</button>
</div>
<?php require 'partials/footer.php' ?>