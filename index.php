<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mes citation</title>
</head>
<body>

    <h1>veuiller entre votre citation</h1>
    <?php 
    $servername  = "localhost";
    $username = "root";
    $password = " ";

    $conn =new mysqli($servername, $username, $password);

    if($conn->connect_error){
        die("Erreur : " . $conn->connect_error);
    }
    echo "connection reussie";

    ?>
    <form action="index.php" method="POST">
        <label for="auteur">quel est le nom de l'auteur</label>
        <input type="text" name="auteur"></br>
        <label for="citation">entrez  votre citation preferer</label>
        <input type="text" name="citation"></br>
    </form>
</body>

</html>