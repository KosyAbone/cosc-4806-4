<?php require_once 'app/views/templates/header.php';?>

<div class="container">
  <h1>Create New Reminder</h1>

  <form action="/reminders/create" method="post">
    <div>
      <label for="subject">Subject</label><br>
      <input
        type="text"
        name="subject"
        id="subject"
        required
      >
    </div>
    <button type="submit">Save Reminder</button>
  </form>
</div>

<?php require_once 'app/views/templates/footer.php'; ?>