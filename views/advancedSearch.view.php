<?php require 'partials/head.php' ?>
<?php require 'partials/nav.php' ?>
<div class="advanced-search bg-light">
    <form action="" class="bg-white">
        <h2>Adavanced Search</h2>
        <div class="mb-3">
            <label for="" class="h5">By title</label>
            <input type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" class="h5">By Category:</label>
            <select class="form-select" aria-label="Default select example">
                <option selected>Select</option>
                <option value="1">Development</option>
                <option value="2">Music</option>
                <option value="3">Bussiness</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="h5">By Review Score:</label>
            <select class="form-select" aria-label="Default select example">
                <option selected>Select</option>
                <option value="1">1 star</option>
                <option value="2">2 star</option>
                <option value="3">3 star</option>
                <option value="4">4 star</option>
                <option value="5">5 star</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="customRange1"  class="h5">Price Range</label>
            <br>
            <label for=""  class="h6">From:</label>
            <input type="number" class="form-control">
            <label for=""  class="h6">To:</label>
            <input type="number" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>
<?php require 'partials/footer.php' ?>