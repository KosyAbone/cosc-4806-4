<?php

class Reminder {
    
    public function __construct() {

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

    public function getById(int $id): ?array
    {
        $db   = db_connect();
        $stmt = $db->prepare("
            SELECT id, subject, created_at
              FROM notes
             WHERE id = :id
               AND user_id = :user_id
        ");
        $stmt->execute([
            ':id'       => $id,
            ':user_id'  => $_SESSION['user_id'],
        ]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    public function update(int $id, string $subject): bool
    {
        $db   = db_connect();
        $stmt = $db->prepare(
            "UPDATE notes
                SET subject = :subject
              WHERE id = :id
                AND user_id = :user_id"
        );
        return $stmt->execute([
            ':id'       => $id,
            ':user_id'  => $_SESSION['user_id'],
            ':subject'  => $subject
        ]);
    }

}