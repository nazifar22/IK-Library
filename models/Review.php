<?php

class Review {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function addReview($bookId, $userId, $rating, $comment) {
        $stmt = $this->db->prepare("INSERT INTO reviews (book_id, user_id, rating, comment) VALUES (?, ?, ?, ?)");
        $stmt->bindParam(1, $bookId);
        $stmt->bindParam(2, $userId);
        $stmt->bindParam(3, $rating);
        $stmt->bindParam(4, $comment);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function getReviewsByBookId($bookId) {
        $stmt = $this->db->prepare("SELECT * FROM reviews WHERE book_id = ?");
        $stmt->bindParam(1, $bookId);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
