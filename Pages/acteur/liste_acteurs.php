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
  echo "<form action='../accueil.php'><br>";
  echo "<input type='submit' value='Accueil'></form>";
    $file_db = new PDO("sqlite:../../../BD/acteurs.sqlite");
    $request = $file_db->query("SELECT * FROM acteurs");
    foreach ($request as $c){
      echo "($c[0], $c[1], $c[2], $c[3], $c[4], $c[5])<br>";
    }
  ?>
</body>
</html>
