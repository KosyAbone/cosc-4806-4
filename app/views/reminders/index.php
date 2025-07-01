<?php 
    require_once 'app/views/templates/header.php'; 
    $data = $data ?? ['reminders' => []];
?>

<div class="container">
    <h1 class="mb-4"><?= $_SESSION['username'] ?>'s Reminders</h1>
    <p>
      <a href="/reminders/createForm" class="btn btn-success mb-3">
        Create New Reminder
      </a>
    </p>

    <ul class="list-group">
      <?php foreach ($data['reminders'] as $reminder): ?>
        <?php 
          $toggleClass = $reminder['completed']
            ? 'btn-outline-secondary'
            : 'btn-outline-success';
          $toggleText  = $reminder['completed']
            ? 'Mark Undone'
            : 'Mark Done';
        ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <div style="<?= $reminder['completed'] ? 'text-decoration: line-through;' : '' ?>">
            <strong><?= htmlspecialchars($reminder['subject'], ENT_QUOTES) ?></strong><br>
            <small class="text-muted">
              (created at <?= date('Y-m-d H:i', strtotime($reminder['created_at'])) ?>)
            </small>
          </div>
          <div class="btn-group">
            <!-- View details -->
            <button 
              type="button" 
              class="btn btn-sm btn-outline-info" 
              data-bs-toggle="modal" 
              data-bs-target="#viewModal<?= $reminder['id'] ?>"
            >
              View
            </button>

            <!-- Update -->
            <a 
              href="/reminders/editForm/<?= $reminder['id'] ?>" 
              class="btn btn-sm btn-outline-primary"
            >
              Update
            </a>

            <!-- Toggle Completed (after Update) -->
            <a 
              href="/reminders/toggle/<?= $reminder['id'] ?>" 
              class="btn btn-sm <?= $toggleClass ?>"
            >
              <?= $toggleText ?>
            </a>

            <!-- Delete -->
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

<?php foreach ($data['reminders'] as $reminder): ?>
<div 
  class="modal fade" 
  id="viewModal<?= $reminder['id'] ?>" 
  tabindex="-1" 
  aria-labelledby="viewModalLabel<?= $reminder['id'] ?>" 
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewModalLabel<?= $reminder['id'] ?>">
          Reminder Details
        </h5>
        <button 
          type="button" 
          class="btn-close" 
          data-bs-dismiss="modal" 
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <p><strong>ID:</strong> <?= $reminder['id'] ?></p>
        <p><strong>Subject:</strong> <?= htmlspecialchars($reminder['subject'], ENT_QUOTES) ?></p>
        <p>
          <strong>Created At:</strong> 
          <?= $reminder['created_at']?>
        </p>
        <p>
          <strong>Completed:</strong>
          <?= $reminder['completed'] ? 'Yes' : 'No' ?>
        </p>
      </div>
      <div class="modal-footer">
        <button 
          type="button" 
          class="btn btn-secondary" 
          data-bs-dismiss="modal"
        >
          Close
        </button>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

<?php require_once 'app/views/templates/footer.php'; ?>
