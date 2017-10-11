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
    $file_db->exec("CREATE TABLE IF NOT EXISTS ACTEURDANSFILM(
      ref_code_film INTEGER,
      ref_code_acteur INTEGER
    )");
      //
      // $lines = file('film_acteur.txt');
      // foreach ($lines as $lineContent)
      // {
      // 	echo "array" . $lineContent . "<br>";
      // }

    $acteur_film = array(
      array(1, 1),
      array(1, 2),
      array(1, 3),
      array(1, 4),
      array(2, 5),
      array(2, 6),
      array(3, 7),
      array(3, 8),
      array(3, 9),
      array(3, 10),
      array(4, 11),
      array(4, 12),
      array(4, 13),
      array(4, 14),
      array(5, 15),
      array(5, 16),
      array(6, 17),
      array(6, 18),
      array(8, 18),
      array(6, 19),
      array(7, 20),
      array(7, 21),
      array(7, 22),
      array(8, 23),
      array(8, 24),
      array(9, 25),
      array(9, 26),
      array(10, 27),
      array(10, 28),
      array(11, 29),
      array(11, 30),
      array(11, 31),
      array(12, 32),
      array(12, 33),
      array(12, 34),
      array(13, 35),
      array(13, 36),
      array(13, 37),
      array(14, 38),
      array(14, 39),
      array(15, 40),
      array(15, 41),
      array(16, 42),
      array(16, 43),
      array(17, 44),
      array(17, 45),
      array(17, 46),
      array(18, 47),
      array(18, 48),
      array(19, 49),
      array(19, 50),
      array(20, 51),
      array(20, 52),
      array(21, 53),
      array(21, 54),
      array(22, 55),
      array(22, 56),
      array(23, 57),
      array(23, 58),
      array(24, 59),
      array(24, 60),
      array(25, 61),
      );

    $insert = "INSERT INTO ACTEURDANSFILM (ref_code_film,ref_code_acteur)
    VALUES (:ref_code_film,:ref_code_acteur)";
    $stmt = $file_db->prepare($insert);
    $stmt->bindParam(':ref_code_film', $ref_code_film);
    $stmt->bindParam(':ref_code_acteur', $ref_code_acteur);

    foreach($acteur_film as $f){
      $ref_code_film = $f[0];
      $ref_code_acteur = $f[1];
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
