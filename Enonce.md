Énoncé du TP : Système de connexion en PHP avec Sessions, Cookies et fichier JSON
🎯 Objectif du TP
Réaliser un mini-système d’authentification complet en PHP sans base de données, en s'appuyant uniquement sur :
•	un fichier JSON contenant les utilisateurs ;
•	les sessions PHP pour la connexion classique ;
•	un cookie “remember me” pour la reconnexion automatique ;
•	quelques bonnes pratiques de sécurité (password hash, token sécurisé, etc.).
Ce TP doit te permettre de comprendre les mécanismes fondamentaux d’authentification web sans framework.
________________________________________
📂 1. Architecture attendue du projet
Le dossier du projet doit contenir au minimum :
/tp-login/
    users.json
    Classes
    register.php
    login.php
    profile.php
    logout.php
________________________________________
📌 2. Fonctionnalités obligatoires
A. Fichier JSON d'utilisateurs
•	Le fichier users.json stocke une liste d’utilisateurs sous forme de tableau d’objets.
•	Chaque utilisateur doit avoir au minimum :
o	un ID numérique,
o	un nom d'utilisateur (unique),
o	un mot de passe haché,
o	un champ pour stocker un remember token (haché).
Exemple :
[
    {
        "id": 1,
        "username": "alice",
        "password_hash": "…",
        "remember_token_hash": "…"
    }
]
________________________________________
B. Page d'inscription (register.php)
L’utilisateur doit pouvoir :
•	choisir un nom d’utilisateur ;
•	choisir un mot de passe ;
•	créer un compte qui sera enregistré dans users.json.
Contraintes :
•	le mot de passe doit être stocké haché (password_hash) ;
•	le nom d’utilisateur doit être unique ;
•	le fichier JSON doit être sauvegardé avec verrouillage (LOCK_EX).
________________________________________
C. Page de connexion (login.php)
L’utilisateur doit pouvoir :
•	saisir son username et mot de passe ;
•	optionnellement cocher « Se souvenir de moi » ;
•	être redirigé vers profile.php après connexion.
Fonctionnalités attendues :
•	vérification du mot de passe avec password_verify;
•	création d’une session PHP ;
•	si « remember me » est activé :
o	générer un token aléatoire sécurisé (32 bytes),
o	stocker son hash dans users.json,
o	stocker le token original dans un cookie HTTP-only pendant 30 jours.
________________________________________
D. Connexion automatique via Cookie
Si l’utilisateur revient sur le site sans session :
•	vérifier si le cookie “remember me” existe ;
•	vérifier qu’il correspond à un utilisateur du fichier JSON ;
•	reconnecter automatiquement l’utilisateur ;
•	régénérer la session (session_regenerate_id).
________________________________________
E. Page protégée (profile.php)
•	Accessible uniquement si l'utilisateur est connecté (session OU cookie).
•	Doit afficher au minimum :
o	le nom de l'utilisateur connecté ;
o	un lien de déconnexion.
________________________________________
F. Déconnexion (logout.php)
Doit :
•	détruire la session ;
•	effacer le cookie "remember me" ;
•	supprimer le token du fichier JSON (sécurité) ;
•	rediriger vers la page de login.
________________________________________
🔐 3. Exigences de sécurité
Ton système doit obligatoirement :
1.	Hacher les mots de passe (password_hash, password_verify).
2.	Générer un token remember-me sécurisé (random_bytes(32)).
3.	Stocker uniquement le hash du token côté serveur.
4.	Utiliser session_regenerate_id(true) après login.
5.	Mettre le cookie en HTTP-only et en secure si HTTPS.
6.	Empêcher les écritures concurrentes sur users.json (LOCK_EX).
7.	Ajouter un token CSRF sur les formulaires POST (bonus fortement recommandé).
________________________________________
🧪 4. Ce que vous devez démontrer dans le rendu
Le rendu doit contenir :
•	les 5 fichiers mentionnés ;
•	le fichier JSON fonctionnel ;
•	une démonstration vidéo ou capture d’écran montrant :
1.	inscription ;
2.	login classique ;
3.	login via cookie remember-me (après redémarrage navigateur) ;
4.	logout ;
5.	impossibilité d'accéder à profile.php sans être connecté.

