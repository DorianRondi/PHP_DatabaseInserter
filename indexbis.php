<?php
if(isset($_POST['submit2'])){
    header("Location:http://127.0.0.1:8000/index.php");
}

require_once 'connect.php';
$pdo = new \PDO(DSN, USER, PASS);

if(
    ($_POST["firstname"] != "" || $_POST["firstname"] > 45)
    &&
    ($_POST["lastname"] != "" || $_POST["lastname"] > 45)
){
    $firstname = trim($_POST['firstname']); 
    $lastname = trim($_POST['lastname']);

    $query = 'INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)';
    $statement = $pdo->prepare($query);

    $statement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);
    $statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);
    $statement->execute();

    $friends = $statement->fetchAll();
}

$query = "SELECT * FROM friend";
$statement = $pdo->query($query);
$friends = $statement->fetchAll(PDO::FETCH_ASSOC);

function amigo(array $friend){
    return "$friend[firstname] $friend[lastname]";
}
?>

<form action="index.php" method="POST">
    <fieldset>
        <label for="firstname">Prénom</label>
        <input type="text" id="firstname" name="firstname" >
        <label for="lastname">Nom</label>
        <input type="text" id="lastname" name="lastname" >
        <input type="submit" name="submit2">
    </fieldset>
</form>

<ul>
    <?php FOREACH($friends as $listItem): ?>
    <li><?= amigo($listItem); ?></li>
    <?php ENDFOREACH ?>
</ul>