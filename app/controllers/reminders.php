<?php

class Reminders extends Controller{
    public function index()
    {
        $reminderModel = $this->model('Reminder');
        $reminders = $reminderModel->getAllReminders();
        
        $this->view('reminders/index', [
            'reminders' => $reminders
        ]);
    }

    public function createForm(){
        $this->view('reminders/createForm');
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /reminders/createForm');
            exit;
        }

        $subject = trim($_POST['subject'] ?? '');
        $model = $this->model('Reminder');             
        $model->create($subject);         
        
        header('Location: /reminders');
        exit;
    }

    public function update($id){
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: /reminders/editForm/$id");
            exit;
        }

        $subject = trim($_POST['subject'] ?? '');
        $model = $this->model('Reminder');
        $model->update((int)$id, $subject);

        header('Location: /reminders');
        exit;
    }
}
