<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nos Produits</title>
    <style>
        body {
            font-family: Arial;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #333;
            padding: 15px;
            color: white;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
            font-size: 16px;
        }
        .navbar a:hover {
            color: #4CAF50;
        }
        .content {
            margin: 20px;
        }
        h1 {
            clear: both;
            text-align: center;
        }
        .product {
            border: 1px solid #ccc;
            padding: 15px;
            margin: 10px;
            width: 250px;
            float: left;
        }
        .product h3 {
            color: #333;
        }
        .price {
            color: green;
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="/products">Produits</a>
        <a href="/cart">Mon Panier</a>
        <a href="/order/history">Mes Commandes</a>
        <a href="/logout" style="float: right;">Déconnexion</a>
    </div>
    
    <div class="content">
        <h1>Nos Produits</h1>
        
        <?php foreach($products as $product): ?>
            <div class="product">
                <h3><?= $product['nom'] ?></h3>
                <p><?= $product['description'] ?></p>
                <p class="price"><?= $product['prix'] ?> €</p>
                <p>Stock: <?= $product['stock'] ?></p>
                <a href="/product?id=<?= $product['id'] ?>">Voir détails</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>