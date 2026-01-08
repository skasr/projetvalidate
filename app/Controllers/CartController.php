<?php

declare(strict_types=1);

namespace Mini\Controllers;

use Mini\Core\Controller;
use Mini\Models\Cart;
use Mini\Models\Product;

final class CartController extends Controller
{
    public function index(): void
    {
        session_start();
        
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
        
        $userId = $_SESSION['user_id'];
        $cartItems = Cart::getCartByUser($userId);
        $total = 0;
        
        foreach ($cartItems as $item) {
            $total += $item['prix'] * $item['quantite'];
        }
        
        $this->render('cart/index', params: [
            'cartItems' => $cartItems,
            'total' => $total
        ]);
    }
    
    public function add(): void
    {
        session_start();
        
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
        
        $userId = $_SESSION['user_id'];
        $productId = $_POST['product_id'] ?? 0;
        $quantite = $_POST['quantite'] ?? 1;
        
        Cart::addToCart($userId, $productId, $quantite);
        
        header('Location: /cart');
        exit;
    }
    
    public function remove(): void
    {
        session_start();
        $cartId = $_GET['id'] ?? 0;
        
        Cart::removeFromCart($cartId);
        
        header('Location: /cart');
        exit;
    }
}