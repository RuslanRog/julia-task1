<?php

namespace App\Models;
use PDO;


class Page
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM pages WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function getByFriendly($friendly)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM pages WHERE friendly = ?');
        $stmt->execute([$friendly]);
        return $stmt->fetch();
    }
}
