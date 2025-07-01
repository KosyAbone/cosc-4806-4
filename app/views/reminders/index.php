<?php 
    require_once 'app/views/templates/header.php'; 
    $data = $data ?? ['reminders' => []];
?>

<div class="container">
    <div class="container">
        <h1><?= $_SESSION['username'] ?>'s Reminders</h1>
        <p><a href="/reminders/createForm">Create New Reminder</a></p>

        <ul>
          <?php foreach ($data['reminders'] as $reminder): ?>
            <li>
              <strong><?= htmlspecialchars($reminder['subject'], ENT_QUOTES) ?></strong>
              <em>(created at <?= $reminder['created_at'] ?>)</em>
              
              <a href="/reminders/editForm/<?= $reminder['id'] ?>"
              >Update</a>

              <a href="/reminders/delete/<?= $reminder['id'] ?>"
                onclick="return confirm('Are you sure you want to delete this reminder?');"
                
              >Delete</a>
            </li>
          <?php endforeach; ?>
        </ul>
    </div>

<?php require_once 'app/views/templates/footer.php'; ?>
