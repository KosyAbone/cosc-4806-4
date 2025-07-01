<?php require_once 'app/views/templates/header.php'; ?>

<div class="container">
  <h1>Edit Reminder</h1>

  <form action="/reminders/update/<?= $reminder['id'] ?>" method="post">
    <div>
      <label for="subject">Subject</label><br>
      <input
        type="text"
        name="subject"
        id="subject"
        value="<?= htmlspecialchars($reminder['subject'], ENT_QUOTES) ?>"
        required
      >
    </div>
    <button type="submit">Update</button>
  </form>
</div>

<?php require_once 'app/views/templates/footer.php'; ?>
