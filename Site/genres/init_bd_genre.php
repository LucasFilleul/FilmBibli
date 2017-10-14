<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../CSS/films.css" />
  <title> Films </title>
</head>
<body>
  <?php
  try{
    $file_db = new PDO("sqlite:../../../BD/base_de_donnes_FILM.sqlite");
    $file_db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $file_db->exec("CREATE TABLE IF NOT EXISTS genres(
      code_genre INTEGER,
      nom_genre TEXT,
      img TEXT
    )");

      // $lines = file('genres.txt');
      // foreach ($lines as $lineContent)
      // {
      // 	echo "array" . $lineContent . "<br>";
      // }

    $genres = array(
      array(1,'Comédie', 'comedie'), // Done
     array(2,'Drame', 'drame'), // Done
     array(3,'Romance', 'romance'), // Done
     array(4,'Action', 'action'),// Done
     array(5,'Historique', 'historique'),// Done
     array(6,'Mythologie / Antiquité', 'peplum'),// Done
     array(7,'Cape et Epée', 'capetepee'),// Done
     array(8,'Western', 'western'), // Done
     array(9,'Aventure', 'aventure'),// Done
     array(10,'Thriller', 'thriller'),// Done
     array(11,'Fantastique', 'fantastique'),// Done
     array(12,'Science-Fiction', 'scifie'),// Done
     array(13,'Horreur', 'horreur'),// Done
     array(14,'Catastrophe', 'catastrophe'), // Done
     array(15,'Erotique', 'erotique'),// Done
     array(16,'Fantaisie', 'fantaisie'),// Done
     array(17,'Dessin annimées', 'anime')// Done
      );

    $insert = "INSERT INTO genres (code_genre, nom_genre,img)
    VALUES (:code_genre,:nom_genre,:img)";
    $stmt = $file_db->prepare($insert);
    $stmt->bindParam(':code_genre', $code_genre);
    $stmt->bindParam(':nom_genre', $nom_genre);
    $stmt->bindParam(':img', $img);

    foreach($genres as $f){
      $code_genre = $f[0];
      $nom_genre = $f[1];
      $img = $f[2];
      $stmt->execute();
    }
    $file_db = null;
    echo "BD initialisée";
  }
  catch(PDOException $e){
    echo $e->getMessage();
  }
  ?>
</body>
</html>
