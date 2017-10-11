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
