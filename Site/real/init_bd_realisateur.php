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
    /* Instancie et implémente la BD */
    $file_db = new PDO("sqlite:../../../BD/base_de_donnes_FILM.sqlite");
    $file_db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $file_db->exec("CREATE TABLE IF NOT EXISTS realisateur(
      code_real INTEGER,
      nom TEXT,
      prenom TEXT,
      nationalite TEXT,
      date_naiss INTEGER,
      date_mort INTEGER,
      image TEXT)");

      /* liste de Realisateur */
    $acteurs = array(
      array(1,'De Chauveron','Philippe','FR', 1965 , 0, 'Philippe_de_Chauveron.JPG'),
      array(2,'Russell','Chuck','USA', 1958, 0, 'Chuck_russel.jpg'),
      array(3,'Greenfield','Luke','USA', 1972 , 0, 'Greenfield_Luke.jpeg'),
      array(4,'Lartigau','Éric','FR', 1964, 0, 'Eric-Lartigau.jpg'),
      array(5,'Toledano','Éric','FR', 1971, 0, 'Eric-Toledano.jpg'),
      array(6,'Nakache','Olivier','FR', 1973, 0, 'Nakache_Olivier.jpg'),
      array(7,'Tarantino','Quentin','USA', 1963, 0, 'Quentin_Tarantino.jpg'),
      array(8,'Emmerich','Roland','ALL', 1955, 0, 'Roland_Emmerich.jpg'),
      array(9,'Leone','Sergio','ITA', 1929, 1989, 'Sergio-Leone.jpg'),
      array(10,'Campbell','Martin','NZ', 1943, 0, 'Campbell_Martin.jpg'),
      array(11,'Zem','Roschdy','FR', 1965, 0, 'Roschdy_Zem.jpg'),
      array(12,'Hallström','Lasse','SUE', 1946, 0, 'Lasse-Hallstrom.jpg'),
      array(13,'Bouchareb','Rachid','FR', 1953, 0, 'Bouchareb_Rachid.jpg'),
      array(14,'Columbus','Chris','USA', 1958, 0, 'Columbus_Chris.jpg'),
      array(15,'Spielberg','Steven','USA', 1946, 0, 'Spielberg_Steven.jpg'),
      array(16,'Fincher','David','USA', 1962, 0, 'Fincher_David.jpg'),
      array(17,'Cameron','James','CAN', 1954, 0, 'James_Cameron.jpg'),
      array(18,'Lucas','George','USA', 1944, 0, 'Lucas_Georges.jpg'),
      array(19,'Cronenberg','David','CAN', 1943, 0, 'David_Cronenberg.jpg'),
      array(20,'Despentes','Virginie','FR', 1969, 0, 'despentes_virginie.jpg'),
      array(21,'Trinh Thi','Coralie','FR', 1976, 0, 'trinh_thi.jpg'),
      array(22,'Snyder','Zack','USA', 1966, 0, 'Zack_Snyder.jpg'),
      array(23,'Rich','Richard','USA', 1951, 0, 'Richard_Rich.jpg'),
      array(24,'Berman','Ted','USA', 1919, 2001, 'Berman_Ted.jpg'),
      array(25,'Stevens','Art','USA', 1915, 2007, 'Art_Stevens.jpg'),
      );

      /* Prépare et effectue l'implémentation de la BD */
    $insert = "INSERT INTO realisateur (code_real, nom, prenom, nationalite, date_naiss, date_mort,image)
    VALUES (:code_real,:nom,:prenom,:nationalite,:date_naiss, :date_mort, :image)";
    $stmt = $file_db->prepare($insert);
    $stmt->bindParam(':code_real', $code_real);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':nationalite', $nationalite);
    $stmt->bindParam(':date_naiss', $date_naiss);
    $stmt->bindParam(':date_mort', $date_mort);
    $stmt->bindParam(':image', $image);

    foreach($acteurs as $f){
      $code_real = $f[0];
      $nom = $f[1];
      $prenom = $f[2];
      $nationalite = $f[3];
      $date_naiss = $f[4];
      $date_mort = $f[5];
      $image = $f[6];
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
