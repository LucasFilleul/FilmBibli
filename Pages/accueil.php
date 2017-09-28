<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="films.css" />
  <title> Films </title>
</head>
<body>
  <?php
  // FORMULAIRE POUR AFFICHER TOUT LES FILM
  echo "<form action='liste_films.php'><br>";
  echo "<br><h4>Voulez-vous la liste des films complète ?</h4>";
  echo "<input type='submit' value='Valider'></form>";
  // FORMULAIRE POUR AJOUTER FILM
  echo "<form action='ajouter_film.php'><br>";
  echo "<br><h4>Voulez-vous ajouter un film ?</h4>";
  echo "<input type='submit' value='Ajouter'></form>";
  ?>
</body>
</html>
