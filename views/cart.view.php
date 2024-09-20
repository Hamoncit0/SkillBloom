<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<div class="cart bg-light">
<h1>Shopping Cart</h1>
<p>0 courses in Cart</p>
<hr>
<!-- <div class="empty-cart">
    <img src="../images/worried-woman-svgrepo-com.svg" alt="">
    <h5>It seems your cart is empty. Look for new courses!</h5>
    <a href="/exploreCourses" class="btn btn-primary fs-4 fw-medium text-light">Go look for new courses</a>
</div> -->
<div class="filled-cart">
    <div class="cart-products">

        <? require "partials/cartCourse.php" ?>
        <hr>
        <? require "partials/cartCourse.php" ?>
        <hr>
        <? require "partials/cartCourse.php" ?>
        <hr>
        <? require "partials/cartCourse.php" ?>
    </div>
    <div class="checkout-cart">
        <span>Total:</span>
        <h2>MX$509.07</h2>
        <a href="/checkout" class="btn btn-primary fs-4 fw-medium text-light">Checkout</a>

    </div>
</div>
</div>
<? require "partials/footer.php" ?>