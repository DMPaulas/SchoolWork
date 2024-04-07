<?php
$connect = mysqli_connect("localhost", "root", "", "SIM1") or die("erro a abrir a ligação.");
$sql = "SELECT * FROM paciente WHERE Id = ".$_GET['id']."";
$result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Informações</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css" />
</head>
<body style="font-family: Arial">
<div style="width: 100%;max-width:900px; margin:auto;">
    <div class="logo">
        <img src="logo_medi1.png" alt="Example Image">
    </div>
<div class="topbar" style="width: 100%;max-width:1000px; margin:auto;">
    <a href="index.php?action=logout">Logout</a>
    <a href="index.php?action=PerfilM">Perfil</a>
    <div class="dropdown">
        <button class="dropbtn">Pacientes</button>
        <div class="dropdown-content">
            <a href="index.php?action=Registar">Registar</a>
            <a href="index.php?action=PacienteUpdate">Alteração de dados</a>
            <a href="index.php?action=ListaPacientes">Lista de Pacientes</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">Consulta</button>
        <div class="dropdown-content">
            <a href="index.php?action=RegistoConsulta">Registo</a>
            <a href="index.php?action=AgendamentoConsulta">Agendamento de Consulta</a>
            <a href="index.php?action=ListaConsulta">Lista de Consultas</a>
        </div>
    </div>
</div>
    <div class="container">
        <div class="information">
            <fieldset style="margin-bottom:50px; margin-top: 50px;">
                <legend>Ficha do Paciente</legend>
                <?php
                echo "Nome: &nbsp" . $row["Nome"] . "<br><br>";
                echo "Data de Nascimento: &nbsp" . $row["Data_Nascimento"]. "<br><br>";
                echo "Idade: &nbsp" . $row["idade"] . "<br><br>";
                echo "NIF: &nbsp"  . $row["NIF"] . "<br><br>";
                echo "Morada: &nbsp" . $row["Morada"] . "<br><br>";
                echo "Codigo Postal: &nbsp" . $row["Codigo_Postal"]. "<br><br>";
                echo "Concelho: &nbsp" . $row["Concelho"] . "<br><br>";
                echo "Lista de Observações: &nbsp" . $row["Lista"] . "<br><br>";
                ?>
            </fieldset>
        </div>
        <div class="photo">
            <?php
            $photo_path = "uploads/" . $row["foto"];
            if (file_exists($photo_path)) {
                echo '<img src="' . $photo_path . '" alt="Patient Photo">';
            }
            ?>
        </div>
    </div>
<div class="footer">
    <table  align="center" style="width: 100%;max-width:900px; margin:auto;">
        <tr style="background-color:#ddd; color:#333333">
            <th>© SIM - 2021-2022</th>
        </tr>
    </table>
</div>
</div>
</body>
</html>

