<html>
    <head>
        <title>Exercici 7</title>
    </head>
    <body>
        <h1>Exercici 7</h1>
        <p>Crea un formulari en HTML que permetis als usuaris 
            introduir el seu nom, el correu electrònic i un password 
            (dues vegades). Després de l'enviament del formulari, valida 
            que tots els camps han estat completats i que el correu electrònic 
            és vàlid, que el password tinga complexitat i que coincidixen. Mostra 
            un missatge d'error si alguna validació falla, i si tot és correcte, mostra 
            un missatge confirmant que l'usuari s'ha registrat correctament.</p>
            <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = htmlspecialchars($_POST['nom']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST["password"]);
        $confirm_password = htmlspecialchars($_POST["confirm_password"]);

        function validar_contrasenya($password) {
            if (strlen($password) < 8) {
                return "La contraseña debe tener al menos 8 caracteres.";
            }

            if (!preg_match('/[A-Z]/', $password)) {
                return "La contraseña debe tener al menos una letra mayúscula.";
            }

            if (!preg_match('/[\W]/', $password)) {
                return "La contraseña debe tener al menos un carácter especial.";
            }

            return true;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<p>Adreça de correu electrònic no vàlida. Si us plau, torna-ho a intentar.</p>";
        } 
        elseif(($validacion_password = validar_contrasenya($password)) !== true) {
            echo "<p>$validacion_password</p>"; 
        }
        elseif($password !== $confirm_password) {
            echo "<p>Les contrasenyes no coincidixen.</p>";
        }
        else {
            echo "<h2>Se ha registrat correctament!</h2>";
        }
        
    } else {
        ?>
        <h2>Formulari de Registre</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="nom">Nom:</label>
            <input type="nom" id="nom" name="nom" required><br><br>
            <label for="email">Correu electrònic:</label>
            <input type="email" id="email" name="email" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <label for="password">Confirma el Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required><br><br>
            <input type="submit" value="Enviar">
        </form>
        <?php
    }
    ?>
    </body>
</html>