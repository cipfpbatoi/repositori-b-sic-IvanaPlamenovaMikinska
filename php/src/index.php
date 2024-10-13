<?php
session_start();
$users = [
    'ivana' => '1234',
    'batoi' => '1234',
];


foreach ($users as $name => $password) {
    $users[$name] = password_hash($password, PASSWORD_BCRYPT);
}
 

if(isset($_COOKIE['recuerda_user']) && !isset($_SESSION['user'])) {
    $_SESSION['user'] = $_COOKIE['recuerda_user'];
    header("Location: seleccionarJuego.php");
    exit();
}

if (isset($_POST['login'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    if (isset($users[$name]) && password_verify($password, $users[$name])) {
        $_SESSION['user'] = $name;
        if(isset($_POST['recuerdame'])) {
            setcookie('recuerda_user', $name, time() + (86400 * 30), "/");
        }
        header("Location: seleccionarJuego.php");
        exit();
    } else {
        echo "<span class='incorrect'>Invalid name or password.</span>";
    }
}
?>
<html>

<head>
    <title>LOGIN</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1>Iniciar Sesión</h1>
    <form method="post">
        Name: <input type="name" name="name" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <label for="recuerdame">Recordar</label>
        <input type="checkbox" name="recuerdame" id="recuerdame"><br><br>
        <button type="submit" name="login">Login</button><br>
    </form>
</body>

</html>