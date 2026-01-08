<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Panier</title>
    <style>
        body {
            font-family: Arial;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        .total {
            font-size: 24px;
            font-weight: bold;
            color: green;
            margin: 20px 0;
        }
        .btn {
            background-color: #f44336;
            color: white;
            padding: 8px 15px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        .btn-order {
            background-color: #4CAF50;
            color: white;
            padding: 15px 30px;
            border: none;
            cursor: pointer;
            font-size: 18px;
            text-decoration: none;
            display: inline-block;
        }
        .empty {
            text-align: center;
            padding: 50px;
            color: #666;
        }
    </style>
</head>
<body>
    <h1>Mon Panier</h1>
    <a href="/products">← Retour aux produits</a>
    
    <?php if (empty($cartItems)): ?>
        <div class="empty">
            <p>Votre panier est vide</p>
        </div>
    <?php else: ?>
        <table>
            <tr>
                <th>Produit</th>
                <th>Prix unitaire</th>
                <th>Quantité</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
            <?php foreach($cartItems as $item): ?>
            <tr>
                <td><?= $item['nom'] ?></td>
                <td><?= $item['prix'] ?> €</td>
                <td><?= $item['quantite'] ?></td>
                <td><?= $item['prix'] * $item['quantite'] ?> €</td>
                <td>
                    <a href="/cart/remove?id=<?= $item['id'] ?>" class="btn">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        
        <div class="total">
            Total: <?= number_format($total, 2) ?> €
        </div>
        
        <a href="/order" class="btn-order">Valider la commande</a>
    <?php endif; ?>
</body>
</html>