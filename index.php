<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>mes citations preferes</title>
</head>
<body>
<diV class="conteneur">
    <h1>LISTE DE CITATION PREFEREES</h1>
  

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


     
        if($tmt == false){
          die("Erreur");
        }

    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }

    
    
    ?>
    <a href="inputCitation/input.php" class="btn btn-success" >ajouter une nouvelle citation</a>
    <table>
      <thead>
        <tr class="head">
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
    </diV>
    

</body>
</html>