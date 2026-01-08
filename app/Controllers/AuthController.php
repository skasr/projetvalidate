<?php

declare(strict_types=1);

namespace Mini\Controllers;

use Mini\Core\Controller;
use Mini\Models\User;

final class AuthController extends Controller
{
    public function register(): void
    {
        $this->render('auth/register');
    }
    
    public function registerPost(): void
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST')
        {
            header('Location: /login');
            exit;
        }
        $nom = $_POST['nom'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        
        $user = new User();
        $user->setNom($nom);
        $user->setEmail($email);
        $user->setPassword($passwordHash);
        $user->save();
        
        header('Location: /login');
        exit;
    }
    
    public function login(): void
    {
        $this->render('auth/login');
    }
    
    public function loginPost(): void
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        
        $user = User::findByEmail($email);
        
        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_nom'] = $user['nom'];
            header('Location: /products');
            exit;
        } else {
            header('Location: /login');
            exit;
        }
    }
    
    public function logout(): void
    {
        session_start();
        session_destroy();
        header('Location: /login');
        exit;
    }
}