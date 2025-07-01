<?php

class Reminder {
    
    public function __construct() {

    }
    
    public function getAllReminders(): array {
        $db = db_connect();
        $stmt = $db->prepare(
            "SELECT * 
               FROM notes 
           ORDER BY created_at DESC"
        );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}