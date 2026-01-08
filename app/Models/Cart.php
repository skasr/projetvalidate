<?php

declare(strict_types=1);

namespace Mini\Models;

use Mini\Core\Database;
use PDO;

class Cart
{
    public static function getCartByUser($userId)
    {
        $pdo = Database::getPDO();
        $query = "SELECT cart.id, cart.quantite, products.nom, products.prix, products.image 
                  FROM cart 
                  JOIN products ON cart.product_id = products.id 
                  WHERE cart.user_id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function addToCart($userId, $productId, $quantite)
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->prepare("INSERT INTO cart (user_id, product_id, quantite) VALUES (?, ?, ?)");
        return $stmt->execute([$userId, $productId, $quantite]);
    }
    
    public static function removeFromCart($cartId)
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->prepare("DELETE FROM cart WHERE id = ?");
        return $stmt->execute([$cartId]);
    }
    
    public static function clearCart($userId)
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->prepare("DELETE FROM cart WHERE user_id = ?");
        return $stmt->execute([$userId]);
    }
}