<?php
require_once __DIR__ . "/function.php";

session_start();

if (isset($_SESSION['auth']) && $_SESSION['auth'] === true) {
    header('Location: ./thankyou.php');
    die;
}

$logged = null;

if (isset($_POST["login"])) {
    $login = $_POST["login"];
    if ($login == EMAIL) {
        $logged = true;
        $_SESSION["auth"] = true;
    } else {
        $logged = false;
        $_SESSION["auth"] = false;
    };
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <form class="mt-5" action="index.php" method="POST">
        <input type="text" class="form-control" placeholder="inserisci la tua email" aria-label="Example text with button addon" aria-describedby="button-addon1"  name="login">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon1">invia</button>
    </form>
    <?php if (isset($_POST["login"])) { ?>
        <div class="alert <?php echo (($logged) ? "alert-success" : "alert-danger"); ?>" >
            <?php echo ($logged) ? "Accesso riuscito!" : "Accesso non riuscito. Controlla l'email e riprova."; ?>
        </div>
    <?php } ?>
</body>
</html>