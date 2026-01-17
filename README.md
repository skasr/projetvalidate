# Mini Projet MVC - E-commerce

Un petit site e-commerce fait en PHP avec une architecture MVC. C'est un projet pédagogique pour comprendre comment fonctionne le pattern MVC.

## Ce qui est dedans

- **Gestion des produits** : affichage, détails
- **Panier** : ajouter/retirer des articles
- **Commandes** : passer commande et voir l'historique
- **Authentification** : inscription et connexion

## Structure du projet

```
projetmvc/
├── app/
│   ├── Controllers/     # Contrôleurs (logique métier)
│   ├── Models/          # Modèles (données)
│   ├── Views/           # Vues (interface)
│   └── Core/            # Coeur du framework (Router, Database...)
├── public/              # Point d'entrée
└── vendor/              # Dépendances Composer
```

## Installation

1. Cloner le projet
```bash
git clone <https://github.com/skasr/projetvalidate>
cd projetmvc
```

2. Installer les dépendances
```bash
composer install
```

3. Configurer la base de données
- Créer une base MySQL appelée `ecommerce`
- Modifier [app/config.ini](projetmvc/app/config.ini) si besoin (par défaut: root sans mot de passe)

4. Lancer un serveur local
```bash
cd projetmvc/public
php -S localhost:8000
```

5. Ouvrir dans le navigateur : `http://localhost:8000`

## Technologies utilisées

- PHP (orienté objet)
- MySQL avec PDO
- Architecture MVC 


