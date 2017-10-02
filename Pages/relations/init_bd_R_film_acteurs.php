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
    $file_db = new PDO('sqlite:../R_Film_Genre.sqlite');
    $file_db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $file_db->exec("CREATE TABLE IF NOT EXISTS FILMESTDEGENRE(
      code_genre INTEGER,
      nom_genre TEXT
    )");

      // $lines = file('genres.txt');
      // foreach ($lines as $lineContent)
      // {
      // 	echo "array" . $lineContent . "<br>";
      // }

    $genres = array(

      );

    $insert = "INSERT INTO FILMESTDEGENRE (code_genre)
    VALUES (:code_genre,:nom_genre)";
    $stmt = $file_db->prepare($insert);
    $stmt->bindParam(':code_genre', $code_genre);
    $stmt->bindParam(':nom_genre', $nom_genre);

    foreach($genres as $f){
      $code_genre = $f[0];
      $nom_genre = $f[1];
      $stmt->execute();
    }
    $file_db = null;
  }
  catch(PDOException $e){
    echo $e->getMessage();
  }
  ?>
</body>
</html>
