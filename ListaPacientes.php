<?php
$connect = mysqli_connect("localhost", "root", "", "SIM1" ) or die ( "erro a abrir a
ligação.");

$query3="SELECT `Id`,`Nome`, `Morada`, `Codigo_Postal`, `Distrito`, `Concelho`, `Email`, `Sexo`, `NIF`, `Lista`, `Foto`, `Data_Nascimento` FROM `paciente`";


$results3 = mysqli_query($connect, $query3) or die(mysqli_error($connect))

?>
<html>
<head>
    <title>Lista de Pacientes</title>
    <style>
        thead > tr > th {
            background-color: #A0A0A0;
            text-align: center;
            color: white;
            width: 100px;
        }
        tbody > tr > td {
            background-color: white;
            text-align: center;
            color: black;
            border: 1px solid dimgrey;
        }
    </style>
</head>
<body>
<h3 style="margin-top: 50px;">Procurar Paciente</h3>
<form action="index.php?action=SearchPaciente" method="POST">
    <input type="text" name="pesquisa" placeholder="Nome e Apelido">
    <input type="submit" value="search">
</form>

<header style="margin-top: 50px;">
    <h2 align="center">Lista de Pacientes</h2>
</header>

<table cellpadding="7" align="center" style="margin-bottom: 50px; margin-top: 20px; font-size: small;">
    <thead>
    <tr>
        <th>Foto</th>
        <th>ID</th>
        <th>Nome</th>
        <th>Sexo</th>
        <th>Data de Nascimento</th>
        <th>Lista</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while ($row = mysqli_fetch_array($results3)) {
        $photo_path = "uploads/" . $row["Foto"];
        echo "<tr align='center'>";
        echo "<td><img src='" . $photo_path . "' alt='Foto Paciente' style='width: 70px; height: 100px;'></td>";
        echo "<td><a href='";

        if ($_SESSION['Especialidade'] == 'Cardiologia') {
            echo "info_paciente.php?id=" . $row["Id"];
        } elseif ($_SESSION['Especialidade'] == 'Familia') {
            echo "info_pacienteMF.php?id=" . $row["Id"];
        }

        echo "'>" . $row["Id"] . "</a></td>";
        echo "<td>" . $row['Nome'] . "</td>";
        echo "<td>" . ($row['Sexo'] == 1 ? "M" : "F") . "</td>";
        echo "<td>" . $row['Data_Nascimento'] . "</td>";
        echo "<td>" . $row['Lista'] . "</td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>
</body>
</html>
