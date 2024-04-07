<?php
$connect = mysqli_connect("localhost", "root", "", "SIM1") or die("erro a abrir a ligação.");

$sql = "SELECT * FROM consulta WHERE Id_Paciente = ".$_GET['id']."";
$sql2 = "SELECT * FROM paciente WHERE Id = ".$_GET['id']."";

$result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
$result2 = mysqli_query($connect, $sql2) or die(mysqli_error($connect));

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
            <a href="index.php?action=PacienteUpdate">Alteração de dados</a>
            <a href="index.php?action=ListaPacientes">Lista de Pacientes</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">Consulta</button>
        <div class="dropdown-content">
            <a href="index.php?action=ConsultaPorAceitar">Por aceitar</a>
            <a href="index.php?action=ConsultaAgendada">Agendada</a>
        </div>
    </div>
</div>
<div>
<head>
    <header style="margin-top: 50px;">
        <h2 align="center">Informações extras</h2>
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
    <?php
if ($result2->num_rows > 0) {
  $paciente = $result2->fetch_assoc();
  $nome = $paciente['Nome'];
  $data = $paciente['idade'];

  // Exibir as informações do paciente
  echo "Nome: $nome <br><br>";
  echo "Idade: $data";
} else {
  echo "Paciente não encontrado.";
}
    ?>
</head>
    <body>
    <table cellpadding="7" align="center" style="margin-bottom:50px; margin-top: 20px; font-size: small ">
        <thead>
        <tr>
            <th>Consulta Id</th>
            <th>DP1</th>
            <th>DP2</th>
            <th>DP3</th>
            <th>Dispneia</th>
            <th>Hipertenso</th>
            <th>Fumador</th>
            <th>Pressão Arterial</th>
            <th>Colesterol</th>
            <th>Classificação</th>
        </tr>
        </thead>
    <tbody>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["Id_Consulta"] . "</td>";
            echo "<td>" . $row["DORPEITO1"] . "</td>";
            echo "<td>" . $row["DORPEITO2"] . "</td>";
            echo "<td>" . $row["DORPEITO3"] . "</td>";
            echo "<td>" . $row["DISPNEIA"] . "</td>";
            echo "<td>" . $row["HIPERTENSO"] . "</td>";
            echo "<td>" . $row["FUMADOR"] . "</td>";
            echo "<td>" . $row["PRESSAO_ARTERIAL"] . "</td>";
            echo "<td>" . $row["COLESTEROL"] . "</td>";
            echo "<td>" . $row["Valor_Col"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='10'>Nenhuma consulta encontrada.</td></tr>";
    }
    ?>
</table>
</body>
<div>
    <fieldset style="margin-bottom:50px; margin-top: 20px; font-size: small ">
        <legend>Descrição</legend>
        <p> Dorpeito1 (DP1) - Desconforto opressivo/constritivo na face anterior do tórax ou no pescoço, mandíbula, ombro ou braço (Sim - 1 / Não - 0)</p>
        <p> Dorpeito2 (DP2) - Dor no peito desencadeada pelo exercício físico (Sim - 1/ Não - 0)</p>
        <p> Dorpeito3 (DP3) - Dor no peito aliviada pelo repouso ou nitratos em 5 minutos (Sim - 1/ Não - 0)</p>
        <p> Dispneia - Falta de ar (Sim - 1/ Não - 0)</p>
        <p>Hipertenso - (Sim - 1/ Não - 0)</p>
        <p>Fumador - (Sim - 1/ Não - 0)</p>
        <p>Pressão arterial mmHg (valor contínuo aprox. [8 .. 21] )</p>
        <p>Colesterol (mg/dL) - valor de referência <190 mg/dL (valor contínuo aprox. [160 .. 260])</p>
        <p>Classificação SAD - Classificação da Recomendação (1- Não recomendado; 2- Angio TC; 3- TAC)</p>
    </fieldset>
</div>
</div>
<div class="footer">
    <table  align="center" style="width: 100%;max-width:900px; margin:auto;">
        <TR style="background-color:#ddd; color:#333333" >
            <TH> © SIM - 2021-2022 </TH>
    </table>
</div>
</body>
</html>