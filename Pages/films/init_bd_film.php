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
    $file_db->exec("CREATE TABLE IF NOT EXISTS films(
      code_film INTEGER,
      titre TEXT,
      pays TEXT,
      date INTEGER,
      duree INTEGER,
      couleur TEXT,
      realisateur TEXT,
      image TEXT
    )");
    $films = array(
      array(1,'Qu\'est ce qu\'on a fait au bon dieu','FR', 2014, 137,'Couleur','Philippe de Chauveron','aubondieu.jpg'),
      array(2,'The Mask','USA', 1994, 141,'Couleur','Chuck Russell' ,'mask.jpg'),
      array(3,'','', , ,'', ,''),
      array(4,'','', , ,'', ,''),
      array(5,'','', , ,'', ,''),
      array(6,'','', , ,'', ,''),
      array(7,'','', , ,'', ,''),
      array(8,'','', , ,'', ,''),
      array(9,'','', , ,'', ,''),
      array(10,'','', , ,'', ,''),

    );

    $insert = "INSERT INTO films (code_film,titre,pays,date, duree,couleur, realisateur, image)
    VALUES (:code_film,:titre,:pays,:date, :duree,:couleur, :realisateur, :image)";
    $stmt = $file_db->prepare($insert);
    $stmt->bindParam(':code_film', $code_film);
    $stmt->bindParam(':titre', $titre);
    $stmt->bindParam(':pays', $pays);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':duree', $duree);
    $stmt->bindParam(':couleur', $couleur);
    $stmt->bindParam(':realisateur', $realisateur);
    $stmt->bindParam(':image', $image);

    foreach($films as $f){
      $code_film = $f[0];
      $titre = $f[1];
      $pays = $f[2];
      $date = $f[3];
      $duree = $f[4];
      $couleur = $f[5];
      $realisateur = $f[6];
      $image = $f[7];
      $stmt->execute();
    }
    $file_db = null;
    echo "BD initialisée";
    // foreach($films as $f){
    //   echo $f;
    // }
  }
  catch(PDOException $e){
    echo $e->getMessage();
  }
  ?>
</body>
</html>
