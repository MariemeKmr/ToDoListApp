# ToDoList App

Application web de gestion de tâches personnelles développée avec **Laravel 11**, avec système d'authentification complet, gestion des rôles et interface d'administration.

---

## Fonctionnalités

### Côté utilisateur
- Inscription et connexion sécurisées
- Réinitialisation de mot de passe par email
- Création, modification, suppression de tâches (CRUD complet)
- Filtrage des tâches par statut : `À faire`, `En cours`, `Terminé`
- Dashboard personnel affichant toutes ses tâches

### Côté administration
- Dashboard admin dédié
- Liste de tous les utilisateurs
- Création, modification et suppression d'utilisateurs
- Attribution des rôles (`admin` / `user`)

---

## Stack technique

| Composant | Technologie |
|---|---|
| Backend | Laravel 11 (PHP) |
| Frontend | Blade, HTML/CSS vanilla |
| Base de données | MySQL |
| Authentification | Sessions Laravel + middleware custom |
| Identifiants | UUID (HasUuids) |
| Envoi d'emails | Laravel Mail (reset password) |

---

## Architecture du projet

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Auth/
│   │   │   ├── LoginController.php        # Connexion + redirection selon rôle
│   │   │   ├── SignupController.php        # Inscription + connexion automatique
│   │   │   ├── LogoutController.php
│   │   │   ├── ForgotPasswordController.php
│   │   │   └── ResetPasswordController.php
│   │   ├── TaskController.php             # CRUD tâches + filtrage par statut
│   │   ├── AdminController.php            # Dashboard admin
│   │   ├── AdminUserController.php        # Gestion des utilisateurs (admin)
│   │   └── UserController.php             # Dashboard utilisateur
│   └── Middleware/
│       └── CheckRoleMiddleware.php        # Contrôle d'accès par rôle
├── Models/
│   ├── Task.php                           # Modèle tâche (UUID, relation user)
│   └── User.php                           # Modèle utilisateur (UUID, rôle, reset password)
database/
└── migrations/
    ├── create_users_table.php
    └── create_tasks_table.php
resources/views/
    ├── loginPage.blade.php
    ├── signupPage.blade.php
    ├── userDashboard.blade.php
    ├── taskFilter.blade.php
    ├── createTask.blade.php / editTask.blade.php / showTask.blade.php
    ├── adminDashboard.blade.php
    └── adminUsersList.blade.php / adminUsersCreate.blade.php / adminUsersEdit.blade.php
```

---

## Modèle de données

### Table `users`
| Champ | Type |
|---|---|
| id | UUID (PK) |
| first_name | string |
| last_name | string |
| email | string (unique) |
| phone | string (unique) |
| password | string (hashé) |
| role | enum : `admin`, `user` |

### Table `tasks`
| Champ | Type |
|---|---|
| id | UUID (PK) |
| user_id | UUID (FK → users) |
| title | string |
| description | text |
| status | enum : `À faire`, `En cours`, `Terminé` |

---

## Installation

### Prérequis
- PHP >= 8.2
- Composer
- MySQL

### Étapes

```bash
# 1. Cloner le dépôt
git clone https://github.com/MariemeKmr/ToDoListApp.git
cd ToDoListApp

# 2. Installer les dépendances
composer install

# 3. Copier le fichier d'environnement
cp .env.example .env

# 4. Configurer la base de données dans .env
DB_DATABASE=todolist
DB_USERNAME=root
DB_PASSWORD=

# 5. Configurer l'envoi d'emails dans .env (pour le reset password)
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=
MAIL_PASSWORD=

# 6. Générer la clé de l'application
php artisan key:generate

# 7. Lancer les migrations
php artisan migrate

# 8. Démarrer le serveur de développement
php artisan serve
```

L'application sera accessible à `http://localhost:8000`.

---

## Routes principales

| Méthode | URL | Action |
|---|---|---|
| GET | `/login` | Afficher la page de connexion |
| POST | `/login` | Authentifier l'utilisateur |
| GET | `/signup` | Afficher le formulaire d'inscription |
| POST | `/signup` | Créer un compte |
| DELETE | `/logout` | Déconnexion |
| GET | `/user/dashboard` | Dashboard utilisateur (rôle : user) |
| GET | `/task/create` | Formulaire de création de tâche |
| GET | `/tasks/filter/{status}` | Filtrer les tâches par statut |
| GET | `/admin/dashboard` | Dashboard admin (rôle : admin) |
| GET | `/admin/users` | Liste des utilisateurs |

---

## Auteur

**Marieme KAMARA** - Étudiante en Génie Logiciel et Systèmes d'Information  
École Supérieure Polytechnique de Dakar (ESP)  
GitHub : [@MariemeKmr](https://github.com/MariemeKmr)
