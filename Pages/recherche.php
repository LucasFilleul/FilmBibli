<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title> Films </title>
</head>
<body>
  <?php
  if($_SERVER['REQUEST_METHOD'] == "GET"){
    echo "<form method='POST' action='recherche.php'><br>";
    echo "<br><h4>Quel est le type de votre recherche ?</h4>";
    echo "<input type='radio' name='P_recherche' value='acteur'>Par Acteur";
    echo "<input type='radio' name='P_recherche' value='genre'>Par Genre";
    echo "<input type='radio' name='P_recherche' value='film'>Par Film";
    echo "<br><br><input type='submit' value='Valider'></form>";
    echo "<form action='accueil.php'><br>";
    echo "<br><h4>Retourner à l'accueil ?</h4>";
    echo "<input type='submit' value='Accueil'></form>";
  }
  else{
    if($_POST['P_recherche'] == "acteur"){
      echo "<form action='reponse_acteur.php'><br>";
      echo "Nom Acteur : <input type='text' name='nom_recherche'><br>";
      echo "<input type='submit' value='Rechercher'></form>";
    }
    elseif($_POST['P_recherche'] == "genre"){
      echo "<form action='reponse_genre.php'><br>";
      echo "Nom Genre : <input type='text' name='nom_recherche'><br>";
      echo "<input type='submit' value='Rechercher'></form>";
    }
    elseif($_POST['P_recherche'] == "film"){
      echo "<form action='reponse_film.php'><br>";
      echo "Nom Film : <input type='text' name='nom_recherche'><br>";
      echo "<input type='submit' value='Rechercher'></form>";
    }
  }
  ?>
</body>
</html>
