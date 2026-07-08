# Integration du design theme minimal

## Comment nous avons fait

Nous avons commence par integrer le fichier CSS du theme minimal dans `inc/header.php`. Comme toutes les pages utilisent ce header, le meme design a ete applique automatiquement a toute l application.

Ensuite, nous avons adapte les pages pour qu elles utilisent toutes la meme structure. Nous avons d abord inclus `functions.php`, puis defini les informations de la page lorsque c etait necessaire, avant d inclure `header.php`. Le contenu propre a chaque page a ensuite ete place dans la partie centrale.

Pour les nouvelles pages, nous avons reutilise cette meme organisation afin de garder une interface uniforme. Nous avons egalement utilise les classes CSS deja presentes, comme `card`, `table`, `btn` et `form-group`, pour conserver le meme style sur toute l application.

Enfin, nous avons verifie que le theme etait correctement applique en ouvrant les differentes pages dans le navigateur et en controlant que le fichier CSS etait bien charge.
