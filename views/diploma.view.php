<?php require "partials/head.php" ?>
<?php require "partials/nav.php"; ?>
<div class="diploma">
    <div class="diploma-content bg-light-subtle">
        <h2>Certificate of Completion</h2>
        <img src="../images/SkillBloom_icon.png" alt="" style="width:5rem; height:5rem">
        <p>It is certified that</p>
        <h3><?php echo htmlspecialchars($user->firstName . ' ' . $user->lastName); ?></h3>
        <p>has successfully completed the course</p>
        <h3><?php echo htmlspecialchars($kardex->course ?: ''); ?></h3>
        <p>Termination Date</p>
        <h5><?php echo htmlspecialchars($kardex->endDate ?: ''); ?></h5>
        <p>Certified by:</p>
        <h3><?php echo htmlspecialchars($kardex->instructor ?: ''); ?></h3>
        <div class="buttons">

        <button class="btn btn-primary" onclick="window.location.href='/exportPDF?id=<?php echo htmlspecialchars($kardex->id ?: ''); ?>'">Export to PDF</button>
        </div>
    </div>
</div>

<?php require "partials/footer.php" ?>