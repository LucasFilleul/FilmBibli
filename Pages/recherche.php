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
      echo "ACTEUR ";
    }
    elseif($_POST['P_recherche'] == "genre"){
      echo "GENRE ";
    }
    elseif($_POST['P_recherche'] == "film"){
      echo "FILM ";
    }
  }
  phpinfo(INFO_VARIABLES);
  ?>
</body>
</html>
