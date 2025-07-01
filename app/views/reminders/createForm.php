<?php require_once 'app/views/templates/header.php';?>

<div class="container my-5">
  <div class="card mx-auto" style="max-width: 600px;">
    <div class="card-body">
      <h1 class="card-title mb-4">Create New Reminder</h1>

      <form action="/reminders/create" method="post">
        <div class="mb-3">
          <label for="subject" class="form-label">Subject</label>
          <input
            type="text"
            class="form-control"
            name="subject"
            id="subject"
            required
          >
        </div>
        <button type="submit" class="btn btn-success">Save Reminder</button>
        <a href="/reminders" class="btn btn-secondary ms-2">Cancel</a>
      </form>

    </div>
  </div>
</div>

<?php require_once 'app/views/templates/footer.php'; ?>
