<?php require_once 'app/views/templates/header.php'; ?>

<div class="container">
    <h1>Welcome, <?=$_SESSION['username'] ?>!</h1>
    <p> My Reminders</p>

    <p><a href="/logout">Logout</a></p>
</div>

<?php require_once 'app/views/templates/footer.php'; ?>
