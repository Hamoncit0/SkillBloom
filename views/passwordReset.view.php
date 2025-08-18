<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<div class="password-background">
    <div class="forgot-password">
        <form action="" class="card password-reset-card">
            <h3>Forgot Password?</h3>
            <div class="mb-3">
                <label for="">Email:</label>
                <input type="email" placeholder="Email" class="form-control">
            </div>
            <button class="btn btn-primary">Send Email</button>
        </form>
    </div>

    <div class="email-code">
        <form action="" class="card">
            <h3>Type code:</h3>
            <div class="mb-3">
                <label for="">Code:</label>
                <input type="text" placeholder="XXXX" class="form-control">
                <a href="" class="small">Resend email.</a>
            </div>
            <button class="btn btn-primary">Recover Password</button>
        </form>
    </div>

    <div class="password-reset">
        <form action="" class="card">
            <h3>Password:</h3>
            <div class="mb-3">
                <label for="">New Password:</label>
                <input type="password" placeholder="New Password" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Confirm Password:</label>
                <input type="password" placeholder="Confirm Password" class="form-control">
            </div>
            <button class="btn btn-primary">Reset Password</button>
        </form>
                
    </div>
</div>
<?php require "partials/footer.php" ?>