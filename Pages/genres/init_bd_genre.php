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
      array(26,'à l\'antique', 'antique'),
     array(4,'c\'était demain', 'demain'),
     array(5,'pas drôle mais beau', 'pasdrolemaisbeau'),
     array(6,'pauvre espèce humaine', 'pauvreespecehumaine'),
     array(10,'jeu dans le jeu', 'jeudanslejeu'),
     array(15,'poésie en image', 'poesieenimage'),
     array(11,'en France profonde', 'franceprofonde'),
     array(7,'du rire aux larmes (et retour)', 'rireaularme'),
     array(28,'docu', 'docu'),
     array(17,'les chocottes à zéro', 'paspeur'),
     array(19,'la parole est d\'or', 'paroleor'),
     array(20,'Paris', 'Paris'),
     array(14,'culte ou my(s)tique', 'mystique'),
     array(13,'pour petits et grands enfants', 'petitetgrand'),
     array(9,'en avant la musique', 'musique'),
     array(23,'Los Angeles & Hollywood', 'laeth'),
     array(3,'cadavre(s) dans le(s) placard(s)', 'cadavredansplacard'),
     array(21,'vive la (critique) sociale !', 'critiquesociale'),
     array(22,'épique pas toc', 'apique'),
     array(27,'du Moyen-Age à 1914', 'moyenage'),
     array(12,'New-York', 'newyork'),
     array(1,'heurs et malheurs à deux', 'malheurs'),
     array(30,'Bollywooderie', 'bolly'),
     array(16,'conte de fées relooké', 'contefee'),
     array(25,'entre Berlin et Moscou', 'berlinmoscou'),
     array(8,'portrait d\'époque (après 1914)', 'portraitepoque'),
     array(2,'carrément à l\'ouest', 'ouest'),
     array(29,'vers le soleil levant', 'soleil'),
     array(24,'perle de nanard', 'nanard')
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
