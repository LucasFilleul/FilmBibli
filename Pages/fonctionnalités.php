<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title> Films </title>
</head>
<body>
  <?php
  // FORMULAIRE POUR AFFICHER TOUT LES FILM
  echo "<form action='films/liste_films.php'><br>";
  echo "<br><h4>Voulez-vous la liste des films complète ?</h4>";
  echo "<input type='submit' value='Valider'></form>";
  // FORMULAIRE POUR AJOUTER FILM
  echo "<form action='films/ajouter_film.php'><br>";
  echo "<br><h4>Voulez-vous ajouter un film ?</h4>";
  echo "Titre original : <input type='text' name='titreO'><br>";
  echo "Titre français : <input type='text' name='titreFR'><br>";
  echo "Pays : <input type='text' name='pays'><br>";
  echo "Date : <input type='text' name='date'><br>";
  echo "Duree : <input type='text' name='duree'><br>";
  echo "Couleur : <input type='text' name='couleur'><br>";
  echo "Realisateur : <input type='text' name='realisateur'><br>";
  //echo "Image : <input type='text' name='img'>";
  echo "<input type='submit' value='Ajouter'></form>";
  // FORMULAIRE POUR SUPPRIMER FILM
  echo "<form action='films/supprimer_film.php'><br>";
  echo "<br><h4>Voulez-vous supprimer un film ?</h4>";
  echo "Nom original du film : <input type='text' name='titreOS'><br>";
  echo "<input type='submit' value='Supprimer'></form>";

  ?>
</body>
</html>
