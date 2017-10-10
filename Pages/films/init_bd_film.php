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
      // COMEDIE
      array(1,'Qu est ce qu on a fait au bon dieu','FR', 2014, 137,'Couleur','Philippe de Chauveron','aubondieu.jpg'),
      array(2,'The Mask','USA', 1994, 141,'Couleur','Chuck Russell' ,'mask.jpg'),
      array(3,'Cops : Les Forces du désordre','USA', 2015, 144,'Couleur','Luke Greenfield' ,'cops.jpg'),
      array(4,'Mais qui a tué Pamela Rose ?','FR', 2003, 135,'Couleur','Éric Lartigau' ,'pamelarose.jpg'),
      array(5,'Intouchables','FR', 2011, 153,'Couleur', 'Olivier Nakache, Éric Toledano','intouchable.jpg'),
      array(6,'Django Unchained','USA', 2012, 245,'Couleur', 'Quentin Tarantino','django.jpg'),
      array(7,'Pulp Fiction','USA', 1994, 258,'Couleur', 'Quentin Tarantino','pulp.jpg'),
      array(8,'Inglourious Basterds','USA', 2009, 233,'Couleur', 'Quentin Tarantino','inglorious.jpg'),
      array(9,'Les Huit Salopards','USA', 2015, 317,'Couleur', 'Quentin Tarantino','salopars.jpg'),
      array(10,'Kill Bill: Volume 1','USA', 2003, 152,'Couleur', 'Quentin Tarantino','killbill.jpg'),
      array(11,'2012','USA', 2009, 238,'Couleur', 'Roland Emmerich','2012.jpg'),
      array(12,'Il était une fois dans l Ouest','USA/ITA', 1968, 255,'Couleur', ' ergio Leone','ouest.jpg'),
      array(13,'Le Masque de Zorro','USA', 1998, 216, 'Couleur', 'Martin Campbell','zorro.jpg'),
      array(14,'Omar m a tuer','FR', 2011, 125, 'Couleur', 'Roschdy Zem','omar.jpg'),
      array(15,'Un havre de paix','USA', 2013, 156, 'Couleur', 'Lasse Hallström','havrepaix.jpg'),
      array(16,'Indigènes','FR', 2006, 208, 'Couleur', 'Rachid Bouchareb','indigene.jpg'),
      array(17,'Percy Jackson : Le Voleur de foudre','USA', 2010, 158, 'Couleur', 'Chris Columbus','percy.jpg'),
      array(18,'Les Aventuriers de l arche perdue','USA', 1981, 155, 'Couleur', 'Steven Spielberg','indi.jpg'),
      array(19,'Gone Girl','USA', 2014, 229,'Couleur', 'David Fincher','gonegirl.jpg'),
      array(20,'Avatar','USA', 2009, 242,'Couleur', 'James Cameron','avatar.jpg'),
      array(21,'Star Wars, épisode IV : Un nouvel espoir','USA', 1977, 205,'Couleur', 'George Lucas','starwars.jpg'),
      array(22,'La Mouche','USA', 1986, 136,'Couleur', 'David Cronenberg','mouche.jpg'),
      array(23,'Baise-moi','FR', 2000, 117,'Couleur', 'Virginie Despentes, Coralie Trinh Thi','baise.jpg'),
      array(24,'Sucker Punch','USA', 2011, 150,'Couleur', 'Zack Snyder','sucker.jpg'),
      array(25,'Rox et Rouky','USA', 1981, 123,'Couleur', 'Richard Rich, Ted Berman, Art Stevens','roxroukie.jpg')
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
