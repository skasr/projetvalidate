<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes Commandes</title>
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
        .back-link {
            color: #333;
            text-decoration: none;
            margin-bottom: 20px;
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
    <a href="/products" class="back-link">← Retour aux produit</a>
    
    <h1>Mes Commandes</h1>
    
    <?php if (empty($orders)): ?>
        <div class="empty">
            <p>Vous n'avez pas encore de commande</p>
        </div>
    <?php else: ?>
        <table>
            <tr>
                <th>Numéro</th>
                <th>Date</th>
                <th>Total</th>
                <th>Statut</th>
            </tr>
            <?php foreach($orders as $order): ?>
            <tr>
                <td>#<?= $order['id'] ?></td>
                <td><?= $order['created_at'] ?></td>
                <td><?= number_format($order['total'], 2) ?> €</td>
                <td><?= $order['status'] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>