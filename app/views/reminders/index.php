<?php 
    require_once 'app/views/templates/header.php'; 
    $data = $data ?? ['reminders' => []];
?>

<div class="container">
    <div class="container">
        <h1>Welcome, <?= $_SESSION['username'] ?>!</h1>
        <p><a href="/reminders/create">Create New Reminder</a></p>
        <h1>Your Reminders</h1>

        <ul>
          <?php foreach ($data['reminders'] as $reminder): ?>
            <li>
              <strong><?= htmlspecialchars($reminder['subject'], ENT_QUOTES) ?></strong>
              <em>(created at <?= $reminder['created_at'] ?>)</em>
            </li>
          <?php endforeach; ?>
        </ul>
    </div>

<?php require_once 'app/views/templates/footer.php'; ?>
