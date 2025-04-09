<?php

class User {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function createUser($username, $email, $passwordHash, $role = 'user') {
        $stmt = $this->db->prepare("INSERT INTO users (username, email, password_hash, role) VALUES (?, ?, ?, ?)");
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $passwordHash);
        $stmt->bindParam(4, $role);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function getUserByUsername($username) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bindParam(1, $username);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getUserByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bindParam(1, $email);
        $stmt->execute();
        return $stmt->fetch();
    }
}