# BijouRecycle — Site de l'association Bijoux Recyclés

Site web vitrine et gestion pour une association qui recycle des bijoux au profit d’associations caritatives. Découvrez la collection, contribuez ou gérez les contenus via l’espace admin.

---

## Description du projet

**BijouRecycle** est une application web PHP qui présente :

- Une **vitrine** : présentation de l’association, catalogue de bijoux recyclés, actualités, témoignages, événements et FAQ.
- Un **récapitulatif** des sujets et fiches (données issues de la base).
- Un **formulaire d’inscription** pour les utilisateurs.
- Un **espace administrateur** (connexion, gestion des sujets, comptes, sessions).

Le site a été conçu à partir d’un template **Mobirise AI** et utilise **Bootstrap**, du CSS personnalisé et du JavaScript pour l’interface (animations, galeries, formulaires).

---

## Prérequis

- **PHP** 7.4 ou supérieur (avec extension `mysqli`)
- **Serveur web** : Apache, Nginx ou PHP built-in server
- **Base de données** : MySQL ou MariaDB
- Encodage : **UTF-8** pour la BDD et les fichiers

---

## Structure du projet

```
public_html/
├── v2/
│   ├── index.php              # Page d'accueil
│   ├── css/                  # Feuilles de style (Bootstrap, Mobirise, custom)
│   ├── js/                   # Scripts (Bootstrap, animations, formulaires, etc.)
│   ├── images/               # Images du site
│   ├── recapitulatif/        # Récapitulatif sujets/fiches + admin
│   │   ├── recapitulatif.php
│   │   ├── session.php       # Connexion admin
│   │   ├── fiche.php
│   │   ├── admin_sujets.php
│   │   ├── admin_accueil.php
│   │   └── *_action.php      # Traitements (sujets, session, comptes)
│   └── inscription/
│       ├── inscription.php
│       ├── action.php
│       └── place.html        # Carte / iframe (ex. Google Maps)
├── gabarit/
│   └── template/             # Fichiers template / gabarit
└── README.md
```

---

## Installation

### 1. Cloner ou copier le projet

Placer le contenu de `public_html` dans la racine web de votre serveur (ex. `htdocs`, `www`, ou `public_html` selon l’hébergeur).

### 2. Base de données

- Créer une base MySQL/MariaDB et un utilisateur avec les droits nécessaires.
- Importer le schéma et les données si un fichier SQL est fourni.
- Tables utilisées dans le code : `t_compte_cpt`, `t_sujet_suj`, `t_fichier_fic`, `t_news_new` (à adapter selon votre schéma réel).

### 3. Configuration de la connexion

Dans `v2/index.php` (et dans les autres scripts qui se connectent à la BDD), modifier les paramètres de connexion :

```php
$mysqli = new mysqli('localhost', 'VOTRE_UTILISATEUR', 'VOTRE_MOT_DE_PASSE', 'VOTRE_BASE');
```

- Remplacer par votre **hôte**, **utilisateur**, **mot de passe** et **nom de base**.
- Vérifier que le jeu de caractères UTF-8 est bien utilisé (`$mysqli->set_charset("utf8")`).

> **Sécurité** : en production, éviter de mettre les identifiants en dur ; utiliser un fichier de configuration (ex. `config.php`) exclu du dépôt Git.

### 4. Lancer le site

- **Avec Apache/Nginx** : accéder à l’URL correspondant au dossier (ex. `http://localhost/projet3/public_html/v2/`).
- **Avec le serveur PHP intégré** :
  ```bash
  cd public_html/v2
  php -S localhost:8000
  ```
  Puis ouvrir `http://localhost:8000` dans le navigateur.

---

## Pages principales

| Page | URL (relative à `v2/`) | Description |
|------|-------------------------|-------------|
| Accueil | `index.php` | Présentation, stats (sujets/fiches), actualités, catalogue, témoignages, événements, FAQ, contact |
| Récapitulatif | `recapitulatif/recapitulatif.php` | Liste des sujets et fiches |
| Inscription | `inscription/inscription.php` | Formulaire d’inscription |
| Admin | `recapitulatif/session.php` | Connexion et gestion (sujets, comptes, etc.) |

---

## Technologies utilisées

- **Back-end** : PHP (MySQLi)
- **Front-end** : HTML5, CSS3, JavaScript
- **Framework CSS** : Bootstrap
- **Template / UI** : Mobirise AI Website Builder
- **Bibliothèques JS** : Jarallax (parallaxe), Embla (carrousels), Masonry, etc.

---

## Licence et droits

© 2024 Bijoux Recyclés. Tous droits réservés.  
Projet à usage pédagogique ou associatif ; 

---

## Auteur et contribution

Projet réalisé dans le cadre de ma licence informatique .
