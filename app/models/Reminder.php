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

    public function create(string $subject): bool {
        
        $userId = $_SESSION['user_id'] ?? null;
        if (!$userId) {
            throw new RuntimeException('Not logged in');
        }
        $db = db_connect();
        $stmt = $db->prepare(
            "INSERT INTO notes (user_id, subject) VALUES (:user_id, :subject)"
        );
        return $stmt->execute([
            ':user_id' => $userId,
            ':subject' => $subject,
        ]);
    }

}