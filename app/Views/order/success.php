<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Commande validée</title>
    <style>
        body {
            font-family: Arial;
            margin: 50px;
            text-align: center;
        }
        .success-box {
            max-width: 500px;
            margin: 0 auto;
            padding: 40px;
            background-color: #d4edda;
            border: 2px solid #28a745;
            border-radius: 5px;
        }
        h1 {
            color: #155724;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 15px 30px;
            text-decoration: none;
            display: inline-block;
            margin: 10px;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <div class="success-box">
        <h1>✓ Commande validée !</h1>
        <p>Votre commande a été enregistrée avec succes.</p>
        <p>Merci pour votre achat !</p>
        <a href="/products" class="btn">Continuer mes achats</a>
        <a href="/order/history" class="btn">Voir mes commandes</a>
    </div>
</body>
</html>