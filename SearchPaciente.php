<?php
$connect = mysqli_connect("localhost", "root", "", "SIM1" ) or die ( "erro a abrir a
ligação.");

$query3="SELECT `Id`,`Nome`, `Morada`, `Codigo_Postal`, `Distrito`, `Concelho`, `Email`, `Sexo`, `NIF`, `Lista`, `Foto`, `Data_Nascimento` FROM `paciente`";


$results3 = mysqli_query($connect, $query3) or die(mysqli_error($connect))

?>
<html>

<head>
    <title>Lista de Pacientes</title>
</head>
<body>
<h3 style="margin-top: 50px;" >Procurar Paciente</h3>
<form action="index.php?action=SearchPaciente" method="POST">
    <input type="text" name="pesquisa" placeholder="Nome e Apelido">
    <input type="submit" value="pesquisar">
</form>
<?php
    echo "<br>";
if (isset($_paciente['authuser']) && $_paciente['authuser'] == 1) {
    echo "Nome: &nbsp"; echo $_paciente['Nome'];
    echo "<br>";
    echo "Identificação: &nbsp"; echo $_paciente['Id'];

} else {
    echo "Paciente não está registado";
}
?>

</body>

<head>
    <header style="margin-top: 50px;">
        <h2 align="center">Lista de Pacientes</h2>
    </header>
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

<table cellpadding="7" align="center" style="margin-bottom:50px; margin-top: 20px; font-size: small ">
    <thead>
    <tr>
        <TH>ID</TH>
        <TH>Nome</TH>
        <TH>Sexo</TH>
        <TH>Data de Nascimento</TH>
        <TH>lista</TH>
    </tr>
    </thead>
    <tbody>
    <?php

    while ($row = mysqli_fetch_array($results3)) {
        echo "<tr align='center'>";
        echo "<td><a href='Info_paciente.php?id=" . $row["Id"] . "'>" . $row["Id"] . "</a></td>";
        echo "<td>". $row['Nome'] ."</td>";
        echo "<td>". ($row['Sexo'] == 1 ? "M" : "F") ."</td>";
        echo "<td>". $row['Data_Nascimento'] .".</td>";
        echo "<td>". $row['Lista'] .".</td>";
        echo "</tr>";
    }

    ?>
    </tbody>
</table>