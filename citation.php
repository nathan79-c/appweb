<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>mes citations preferes</title>
</head>
<body>
    <h1>LISTE DE CITATION PREFERE</h1>
  

    <?php 
  $host = "localhost" ;
  $dbname = "pdodb";
  $utilisateur = "root";
  $password = "";

  $dsn = "mysql:host=$host;dbname=$dbname";
  $sql = "SELECT * FROM  MES_CITATIONS";
    try{
        $dbco = new PDO("mysql:host=$host;dbname=$dbname", $utilisateur,$password);
       $tmt = $dbco->query($sql);


      /*  $sth = $dbco->query("SELECT nom_auteur, citation FROM mes_citations");
        $sth->execute();
        $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);  */
        if($tmt == false){
          die("Erreur");
        }
/*
        echo '<pre>';
        print_r ($resultat);
        echo '</pre>';
      */
     /*  foreach($resultat as $afficher => $infos){
         echo $afficher. '<br>';
          foreach($infos as $citation => $valeur){
           
                echo  '<h3>'. '<p>' .$citation.'</p>'. ' ' .$valeur.
                '</h3>';
          }
      }  */
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }

    
    
    ?>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>AUTEUR</th>
          <th>CITATION</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $tmt->fetch(PDO::FETCH_ASSOC)) : ?>
          <tr>
            <td><?php echo htmlspecialchars($row['ID']); ?></td>
            <td><?php echo htmlspecialchars($row['NOM_AUTEUR']); ?></td>
            <td><?php echo htmlspecialchars($row['CITATION']); ?></td>

          </tr>
          <?php endwhile; ?>
      </tbody>
    </table>
    <a href="index.php">ajouter une nouvelle citation</a>

</body>
</html>