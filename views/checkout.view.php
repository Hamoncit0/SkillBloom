<?php require 'partials/head.php' ?>
<?php require 'partials/nav.php' ?>
<div class="checkout bg-light">
    <div class="billing-details">
        <h2>Billing details</h2>
        <div class="mb-3">
            <label for="" class="form-label">Full Name</label>
            <input type="text" class="form-control" placeholder="Full Name">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="email" class="form-control" placeholder="Email">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Country</label>
            <input type="text" class="form-control" placeholder="Country">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">State</label>
            <input type="text" class="form-control" placeholder="State">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Zip/postal code</label>
            <input type="text" class="form-control" placeholder="XXX">
        </div>
    </div>
    <div class="payment-method">
        <h2>Payment Method</h2>
            <div class="mb-3">
                <label for="cardNumber" class="form-label">Card Number</label>
                <input type="text" id="cardNumber" class="form-control" placeholder="XXXX XXXX XXXX XXXX">
            </div>
            <div class="mb-3">
                <label for="expiryDate" class="form-label">Expiry Date</label>
                <input type="text" id="expiryDate" class="form-control" placeholder="MM/YY">
            </div>
            <div class="mb-3">
                <label for="cvv" class="form-label">CVV</label>
                <input type="text" id="cvv" class="form-control" placeholder="XXX">
            </div>
            <button class="btn btn-info">Place order</button>
    </div>
    <div class="cart-summary bg-white">
        <h4>Cart Summary</h4>
        <hr>
        <div class="product">
            <h4>Javascript the final course</h4>
            <p>By gandalf</p>
            <h5>MX $250.00</h5>
        </div>
        <hr>
        <div class="product">
            <h4>Javascript the final course</h4>
            <p>By gandalf</p>
            <h5>MX $250.00</h5>
        </div>
        <hr>
        <h4>Total: $500.00</h4>
    </div>
</div>
<?php require 'partials/footer.php' ?>