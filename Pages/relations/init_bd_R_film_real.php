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
    $file_db->exec("CREATE TABLE IF NOT EXISTS FILMESTDE(
      ref_code_film INTEGER,
      ref_code_real INTEGER
    )");
      //
      // $lines = file('film_acteur.txt');
      // foreach ($lines as $lineContent)
      // {
      // 	echo "array" . $lineContent . "<br>";
      // }

    $real_film = array(
      array(1,1),
      array(2,2),
      array(3,3),
      array(4,4),
      array(5,5),
      array(5,6),
      array(6,7),
      array(7,7),
      array(8,7),
      array(9,7),
      array(10,7),
      array(11,8),
      array(12,9),
      array(13,10),
      array(14,11),
      array(15,12),
      array(16,13),
      array(17,14),
      array(18,15),
      array(19,16),
      array(20,17),
      array(21,18),
      array(22,19),
      array(23,20),
      array(23,21),
      array(24,22),
      array(25,23),
      array(25,24),
      array(25,25)
      );

    $insert = "INSERT INTO FILMESTDE (ref_code_film,ref_code_real)
    VALUES (:ref_code_film,:ref_code_real)";
    $stmt = $file_db->prepare($insert);
    $stmt->bindParam(':ref_code_film', $ref_code_film);
    $stmt->bindParam(':ref_code_real', $ref_code_real);

    foreach($real_film as $f){
      $ref_code_film = $f[0];
      $ref_code_real = $f[1];
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
