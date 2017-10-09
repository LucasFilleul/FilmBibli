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
    $file_db = new PDO('sqlite:../../../BD/base_de_donnes_FILM.sqlite');
    $file_db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $file_db->exec("CREATE TABLE IF NOT EXISTS FILMESTDEGENRE(
      ref_code_film INTEGER,
      ref_code_genre INTEGER
    )");

      // $lines = file('film_genre.txt');
      // foreach ($lines as $lineContent)
      // {
      // 	echo "array" . $lineContent . "<br>";
      // }

    $genres_film = array(
      array(1,1),
      array(2,1),
      array(3,1),
      array(4,1),
      array(5,1),
      array(6,4),
      array(7,4),
      array(8,4),
      array(9,4),
      array(10,4),
      array(11,14),
      array(12,8),
      array(13,7),
      array(14,2),
      array(15,3),
      array(16,4),
      array(17,6),
      array(18,9),
      array(19,10),
      array(20,11),
      array(21,12),
      array(22,13),
      array(23,15),
      array(24,16),
      array(25,17)
      );

    $insert = "INSERT INTO FILMESTDEGENRE (ref_code_film,ref_code_genre)
    VALUES (:ref_code_film,:ref_code_genre)";
    $stmt = $file_db->prepare($insert);
    $stmt->bindParam(':ref_code_film', $ref_code_film);
    $stmt->bindParam(':ref_code_genre', $ref_code_genre);

    foreach($genres_film as $f){
      $ref_code_film = $f[0];
      $ref_code_genre = $f[1];
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
