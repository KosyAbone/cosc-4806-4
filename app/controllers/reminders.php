<?php

class Reminders extends Controller {
    public function index() {
        $reminderModel = $this->model('Reminder');

        $allReminders = $reminderModel->getAll();

        $this->view('reminders/index', [
            'reminders' => $allReminders
        ]);
    }
}