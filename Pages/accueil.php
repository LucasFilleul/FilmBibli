<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="films.css" />
  <title> Films </title>
</head>
<body>
  <?php
  try{
    $file_db = new PDO('sqlite:films.sqlite');
    $file_db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $file_db->exec("CREATE TABLE IF NOT EXISTS films(
      code_film INTEGER,
      titre_original TEXT,
      titre_francais TEXT,
      pays TEXT,
      date INTEGER,
      duree INTEGER,
      couleur TEXT,
      realisateur INTEGER,
      image TEXT
    )");
    $fichier_film = file('films.txt');
    $film;
    foreach($fichier_film as $linenumber => $lineContent){
      echo $linenumber . ' ' . $lineContent . '<br>';
    }

    $insert = "INSERT INTO films (code_film,titre_original,titre_francais,pays,date, duree,couleur, realisateur, image)
    VALUES (:code_film,:titre_original,:titre_francais,:pays,:date, :duree,:couleur, :realisateur, :image)";
    $stmt = $file_db->prepare($insert);
    $stmt->bindParam(':code_film', $code_film);
    $stmt->bindParam(':titre_original', $titre_original);
    $stmt->bindParam(':titre_francais', $titre_francais);
    $stmt->bindParam(':pays', $pays);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':duree', $duree);
    $stmt->bindParam(':couleur', $couleur);
    $stmt->bindParam(':realisateur', $realisateur);
    $stmt->bindParam(':image', $image);

    foreach($films as $f){
      $code_film = $f['code_film'];
      $titre_original = $f['titre_original'];
      $titre_francais = $f['titre_francais'];
      $pays = $f['pays'];
      $date = $f['date'];
      $duree = $f['duree'];
      $couleur = $f['couleur'];
      $realisateur = $f['realisateur'];
      $image = $f['image'];
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
