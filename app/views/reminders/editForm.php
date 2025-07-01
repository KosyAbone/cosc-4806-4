<?php require_once 'app/views/templates/header.php'; ?>

<div class="container my-5">
  <div class="card mx-auto" style="max-width: 600px;">
    <div class="card-body">
      <h1 class="card-title mb-4">Edit Reminder</h1>

      <form action="/reminders/update/<?= $reminder['id'] ?>" method="post">
        <div class="mb-3">
          <label for="subject" class="form-label">Subject</label>
          <input
            type="text"
            class="form-control"
            name="subject"
            id="subject"
            value="<?= htmlspecialchars($reminder['subject'], ENT_QUOTES) ?>"
            required
          >
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="/reminders" class="btn btn-secondary ms-2">Cancel</a>
      </form>

    </div>
  </div>
</div>

<?php require_once 'app/views/templates/footer.php'; ?>
