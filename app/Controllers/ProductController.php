<?php

declare(strict_types=1);

namespace Mini\Controllers;

use Mini\Core\Controller;
use Mini\Models\Product;

final class ProductController extends Controller
{
    public function index(): void
    {
        $products = Product::getAllProducts();
        
        $this->render('products/index', params: [
            'products' => $products
        ]);
    }
    
    public function detail(): void
    {
        $id = $_GET['id'] ?? 1;
        $product = Product::findById($id);
        
        $this->render('products/detail', params: [
            'product' => $product
        ]);
    }
}