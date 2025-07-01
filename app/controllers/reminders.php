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

    public function editForm($id){
        $model = $this->model('Reminder');
        $reminder = $model->getById((int)$id);

        $this->view('reminders/editForm', [
            'reminder' => $reminder
        ]);
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

    public function delete($id){
        $model = $this->model('Reminder');
        $model->delete((int)$id);
        
        header('Location: /reminders');
        exit;
    }
}
