<?php

class Reminders extends Controller {
    public function index() {
        $reminderModel = $this->model('Reminder');

        $allReminders = $reminderModel->getAllReminders();

        $this->view('reminders/index', [
            'reminders' => $allReminders
        ]);
    }

    public function create(){
        
        $this->view('reminders/create');
    }
}