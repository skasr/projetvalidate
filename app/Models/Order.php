<?php

declare(strict_types=1);

namespace Mini\Models;

use Mini\Core\Database;
use PDO;

class Order
{
    public static function createOrder($userId, $total)
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->prepare("INSERT INTO orders (user_id, total, status) VALUES (?, ?, 'en cours')");
        return $stmt->execute([$userId, $total]);
    }
    
    public static function getOrdersByUser($userId)
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->prepare("SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function getAllOrders()
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->query("SELECT * FROM orders ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}