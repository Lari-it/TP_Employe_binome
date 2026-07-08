# Comprehension du projet
ETU004220 & ETU004141
## Ce qu on a compris

- Le projet est organise en plusieurs dossiers. Le fichier `index.php` redirige vers les vraies pages qui se trouvent dans `pages`. Les fonctions communes sont dans `inc`.
- La fonction `dbconnect()` permet de reutiliser une seule connexion a la base de donnees pendant l execution du programme.
- Les fonctions `get_all_lines` et `get_one_line` servent a recuperer les resultats des requetes SQL et evitent de repeter le meme code.
- Les requetes SQL sont construites avec `sprintf`. Cette methode fonctionne mais n est pas securisee d'apres ce qu'on sait , contre les injections SQL.
- La date de forne `9999 01 01` indique ,d'apres notre observation ,qu une information est encore valide ou en cours.
- Les changements de departement ou de manager se font en fermant l'ancienne situation puis en ajoutant la nouvelle.
- La recherche des employes est dynamiquement. Seuls les champs remplis seuls  sont utilises dans la requete.
- La pagination permette d afficher un nombre limite d employes par page.
- Les formulaires d'ajouts et de modification utilisent la meme page avec juste de mode different.

## Ce qu'on a pas trop compris pas encore bien compris

- La gestion du statut de manager lors de la modification d un employe.
- La requete qui utilise `SUM(e.gender = 'M')`.
- L ordre dans lequel certaines donnees sont preparees avant l affichage du `header`.
    - Le fait que $editing peut etre false ou directement un tableau (resultat de get_one_department() utilise tel quel comme condition)
    - La question de la concurrence (deux personnes qui modifient la meme fiche en meme temps)



## Fonctions et operateurs appris

- le `??` pour donner une valeur par defaut si une variable n existe pas.
- `urlencode()` ca rend une chaine compatible avec une URL.
- `htmlspecialchars()` sert a proteger les donnees affichees en HTML.
- `sprintf()` pour construire une chaine/une requete SQL..
- `static` pour conserver la valeur d une variable entre plusieurs appels d une fonction.
- `mysqli_free_result()` pour liberer la memoire apres une requete.
- `TIMESTAMPDIFF()` et `DATEDIFF()`  calcu;  difference entre deux dates.
- `ON DUPLICATE KEY UPDATE` pour mettre a jour une ligne si elle existe deja au lieu de provoquer une erreur.
