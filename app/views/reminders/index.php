<?php 
    require_once 'app/views/templates/header.php'; 
    $data = $data ?? ['reminders' => []];
?>

<div class="container">
    <div class="container">
        <h1 class="mb-4"><?= $_SESSION['username'] ?>'s Reminders</h1>
        <p>
          <a href="/reminders/createForm" class="btn btn-success mb-3">
            Create New Reminder
          </a>
        </p>

        <ul class="list-group">
          <?php foreach ($data['reminders'] as $reminder): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <div>
                <strong><?= htmlspecialchars($reminder['subject'], ENT_QUOTES) ?></strong>
                <br>
                <small class="text-muted">(created at <?= $reminder['created_at'] ?>)</small>
              </div>
              <div class="btn-group">
                <a 
                  href="/reminders/editForm/<?= $reminder['id'] ?>" 
                  class="btn btn-sm btn-outline-primary"
                >
                  Update
                </a>
                <a 
                  href="/reminders/delete/<?= $reminder['id'] ?>" 
                  class="btn btn-sm btn-outline-danger"
                  onclick="return confirm('Are you sure you want to delete this reminder?');"
                >
                  Delete
                </a>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
    </div>
<?php require_once 'app/views/templates/footer.php'; ?>