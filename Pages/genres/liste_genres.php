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
  echo "<form action='../genres.php'><br>";
  echo "<input type='submit' value='Accueil'></form>";
    $file_db = new PDO("sqlite:../genres.sqlite");
    $request = $file_db->query("SELECT * FROM genres");
    foreach ($request as $c){
      echo "($c[0], $c[1])<br>";
    }
  ?>
</body>
</html>
