<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../CSS/films.css" />
  <title> Films </title>
</head>
<body>
  <?php
  echo "Voulez vous retourner à l'accueil ?";
  echo "<form action='../HTML/accueil.php'><br>";
  echo "<input type='submit' value='Accueil'></form>";
    $file_db = new PDO("sqlite:../../../BD/base_de_donnes_FILM.sqlite");
    $request = $file_db->query("SELECT * FROM films");
    foreach ($request as $c){
      echo "($c[0], $c[1], $c[2], $c[3], $c[4], $c[5], $c[6], $c[7], $c[8])<br>";
    }
  ?>
</body>
</html>
