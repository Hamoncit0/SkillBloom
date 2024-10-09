<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>
<div class="user-data bg-light">
    <div class="edit-container">
        <div class="leftEditProfile">
            <img class="rounded-circle img-fluid" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgYN6WeHs6tndhVLPPLjId5KiXOlZ26pLLig&s" alt="">
            <h4>First Name</h4>
        </div>
        <div class="rightEditProfile">
            <form action="" id="updateUserInfo">
                <h4>Information:</h4>
                <p class="text-success" id="updateSuccess"></p>
                <div class="mb-3">
                    <input name="editFirstName" type="text" placeholder="First Name" class="form-control" id="firstNameUU">
                    <small class="text-danger" id="firstNameError"></small>
                </div>
                <div class="mb-3">
                    <input name="editLastName" type="text" placeholder="Last Name" class="form-control" id="lastNameUU">
                    <small class="text-danger" id="lastNameError"></small>
                </div>
                <div class="mb-3">
                    <input name="editEmail" type="email" placeholder="Email" class="form-control" disabled id="emailUU" value="user@gmail.com">
                    <small class="text-danger" id="emailError"></small>
                </div>
                <div class="mb-3">
                    <input name="editBirthDate" type="date" placeholder="Email" class="form-control" id="date-inputUU">
                    <small class="text-danger" id="date-inputError"></small>
                </div>
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" id="genderUU">
                        <option value="" disabled selected>Select your gender...</option>
                        <option value="female">Female</option>
                        <option value="male">Male</option>
                        <option value="other">Other</option>
                    </select>
                    <small class="text-danger" id="genderError"></small> 
                </div>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
            <hr>
            <img class="rounded-circle img-fluid" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgYN6WeHs6tndhVLPPLjId5KiXOlZ26pLLig&s" alt="" style="max-width: 50%; align-self:center; margin: 3rem;">
            <button class="btn btn-primary">Upload Picture</button>
            <hr>
            <form id="updateUserPassword" action="">
                <h4>Change Password:</h4>
                <p class="text-success" id="passwordSuccess"></p>
                <div class="mb-3">
                    <input type="password" placeholder="New Password" class="form-control" id="passwordUU">
                    <small class="text-danger" id="passwordError"></small>
                </div>
                <div class="mb-3">
                    <input name="editConfirmNewPassword" type="password" placeholder="Confirm New Password" class="form-control" id="confirmPasswordUU">
                    <small class="text-danger" id="confirmPasswordError"></small>
                </div>
                <button type="submit" class="btn btn-primary">Change Password</button>
            </form>
        </div>
    </div>
</div>

<script src="../scripts/updateUserValidations.js"></script>
<?php require "partials/footer.php" ?>