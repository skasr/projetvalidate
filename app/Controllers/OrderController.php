<?php

declare(strict_types=1);

namespace Mini\Controllers;

use Mini\Core\Controller;
use Mini\Models\Order;
use Mini\Models\Cart;

final class OrderController extends Controller
{
    public function create(): void
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
        
        Order::createOrder($userId, $total);
        Cart::clearCart($userId);
        
        header('Location: /order/success');
        exit;
    }
    
    public function success(): void
    {
        $this->render('order/success');
    }
    
    public function history(): void
    {
        session_start();
        
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
        
        $userId = $_SESSION['user_id'];
        $orders = Order::getOrdersByUser($userId);
        
        $this->render('order/history', params: [
            'orders' => $orders
        ]);
    }
}