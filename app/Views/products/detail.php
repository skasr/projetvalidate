<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $product['nom'] ?></title>
    <style>
        body {
            font-family: Arial;
            margin: 20px;
        }
        .detail-container {
            max-width: 600px;
            border: 2px solid #333;
            padding: 20px;
            margin: 20px auto;
        }
        .product-name {
            color: #333;
            font-size: 28px;
        }
        .price {
            color: green;
            font-size: 32px;
            font-weight: bold;
        }
        .description {
            font-size: 16px;
            line-height: 1.6;
            margin: 20px 0;
        }
        .stock {
            color: #666;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 15px 30px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }
        .back-link {
            color: #333;
            text-decoration: none;
            margin-bottom: 20px;
            display: inline-block;
        }
        input[type="number"] {
            width: 60px;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <a href="/products" class="back-link">← Retour aux produits</a>
    
    <div class="detail-container">
        <h1 class="product-name"><?= $product['nom'] ?></h1>
        <p class="description"><?= $product['description'] ?></p>
        <p class="price"><?= $product['prix'] ?> €</p>
        <p class="stock">Stock disponible: <?= $product['stock'] ?> unités</p>
        
        <form method="POST" action="/cart/add">
            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
            <label>Quantité: </label>
            <input type="number" name="quantite" value="1" min="1" max="<?= $product['stock'] ?>">
            <br>
            <button type="submit" class="btn">Ajouter au panier</button>
        </form>
    </div>
</body>
</html>