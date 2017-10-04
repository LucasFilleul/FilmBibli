<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../CSS/films.css" />
  <title> Films </title>
</head>
<body>
  <?php
    $file_db = new PDO("sqlite:../../BD/films.sqlite");
    $type = $_GET['nom_recherche']+" ";
    $request = $file_db->query("SELECT * FROM films WHERE titre_original='$type'");
    $donnees = $request->fetch();
    echo "($donnees[0], $donnees[1], $donnees[2], $donnees[3], $donnees[4], $donnees[5], $donnees[6], $donnees[7], $donnees[8])<br>";


    echo "Voulez vous retourner à l'accueil ?";
    echo "<form action='accueil.php'><br>";
    echo "<input type='submit' value='Accueil'></form>";

  ?>
</body>
</html>
