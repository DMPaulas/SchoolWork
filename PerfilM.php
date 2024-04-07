<html lang="en">
<head>
    <title>Perfil</title>
</head>
<body>
<header style="margin-top: 50px;">
    <h2 align="center">Bem-Vindo(a) ao seu perfíl</h2>
</header>
<main>
        <fieldset style="margin-bottom: 50px;">
            <legend>Os seus dados</legend>
            <?php

            if($_SESSION['authuser'] = 1) {

                echo "Nome: &nbsp"; echo $_SESSION['Nome'];
                echo "<br><br>";
                echo "Identificação: &nbsp"; echo $_SESSION['Id'];
                echo "<br><br>";
                echo "Username: &nbsp"; echo $_SESSION['Username'];
                echo "<br><br>";
            }
            ?>
        </fieldset>
</main>
</body>
</html>
