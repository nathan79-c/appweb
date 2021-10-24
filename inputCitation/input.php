<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Comment Créer un beau Formulaire de Contact en HTML & CSS</title>
    <link rel="stylesheet" href="style.css" />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <form action="input.php" method="POST">
      <h1>Ma citations preferes</h1>
      <div class="separation"></div>
      <div class="corps-formulaire">
        <div class="gauche">
          <div class="groupe">
            <label for="auteur">Auteur</label>
            <input type="text" name="auteur" autocomplete="off" />
            <i class="fas fa-user"></i>
          </div>
          
        </div>

        <div class="droite">
          <div class="groupe">
            <label for="citation">Citations</label>
            <textarea placeholder="Saisissez ici..." name="citation"></textarea>
          </div>
        </div>
      </div>

      <div class="pied-formulaire" align="center">
        <button name="insert" >Enregistrez</button>
      </div>
      
    </form>
    <?php

  
    $host = "localhost" ;
    $dbname = "pdodb";
    $utilisateur = "root";
    $password = "";
    if(!empty($_POST['auteur']) && !empty($_POST['citation'])) {
       try{
          $pdo = new PDO("mysql:host=$host;dbname=$dbname", $utilisateur,$password);
       }
       catch(PDOException $exc){
           echo $exc->getMessage();
           exit();
       }
       $auteur = $_POST['auteur'];
      $citation =  $_POST['citation'];
  
      $sql = "INSERT INTO MES_CITATIONS(NOM_AUTEUR,CITATION)
      VALUES(:auteur,:citation)";
      $res = $pdo->prepare($sql);
      $exec = $res->execute(array(":auteur"=>$auteur,":citation"=>$citation));
      if($exec){
          echo 'donner inserer';
      }/*else{
          echo "echec de l'operation"; 
      }*/else{
          echo "echec de l'operation";
      }
    }
    ?>
      <a href="../index.php">voir mes citation prefere</a>
   
      
  </body>
</html>
