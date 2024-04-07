<?php
$connect = mysqli_connect("localhost", "root", "", "SIM1") or die("erro a abrir a ligação.");

if(isset($_POST['btnApagar'])){

    $selectedConsultas = $_POST['apagar'];

    $sqlDelete = "DELETE FROM agendamento WHERE Id_Consulta IN (".implode(",", $selectedConsultas).")";
    mysqli_query($connect, $sqlDelete) or die(mysqli_error($connect));
}

if (isset($_POST['btnAgendar'])) {
    $selectedConsultas = $_POST['consulta'];

    foreach ($selectedConsultas as $consultaId) {
        $consultaSql = "SELECT paciente.Nome, paciente.id, agendamento.Data_Agendamento, agendamento.Hora_Agendamento
                    FROM paciente
                    JOIN consulta ON paciente.id = consulta.Id_Paciente
                    JOIN agendamento ON consulta.Id_Consulta = agendamento.Id_Consulta
                    WHERE consulta.Id_Consulta = $consultaId";
        $consultaResult = mysqli_query($connect, $consultaSql) or die(mysqli_error($connect));
        $consultaRow = mysqli_fetch_assoc($consultaResult);

        $nomePaciente = $consultaRow['Nome'];
        $idPaciente = $consultaRow['id'];
        $data_agendada = $consultaRow['Data_Agendamento'];
        $hora_agendada = $consultaRow['Hora_Agendamento'];

        $addSql = "INSERT INTO consultaagendada (Nome, Id_Paciente, Data_Agendada, Hora_Agendada) VALUES ('$nomePaciente', '$idPaciente' ,'$data_agendada', '$hora_agendada')";
        mysqli_query($connect, $addSql) or die(mysqli_error($connect));

        $apagarSql = "DELETE FROM agendamento WHERE Id_Consulta = $consultaId";
        mysqli_query($connect, $apagarSql) or die(mysqli_error($connect));
    }
}

$sql = "SELECT consulta.Id_Consulta, paciente.id AS Id_Paciente, paciente.Nome AS NomePaciente, agendamento.Data_Agendamento AS Data, agendamento.Hora_Agendamento AS Hora, agendamento.Observações AS Observações
        FROM consulta
        INNER JOIN paciente ON consulta.Id_Paciente = paciente.id
        INNER JOIN agendamento ON consulta.Id_Consulta = agendamento.Id_Consulta
        WHERE agendamento.Id_MCardiologista = ".$_SESSION['Id']."";

$result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
?>

<!DOCTYPE html>
<html>
<head>
    <header style="margin-top: 50px;">
        <h2 align="center">Lista de Consultas</h2>
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
<body>
<form action="" method="POST">
<table cellpadding="7" align="center" style="margin-bottom:50px; margin-top: 20px; font-size: small ">
    <thead>
    <tr>
        <th>Id da Consulta</th>
        <th>Paciente</th>
        <th>Data Prevista</th>
        <th>Hora Prevista</th>
        <th>Observações</th>
        <th><button type="submit" name='btnAgendar'>Agendar</button></th>
        <th><button type="submit" name='btnApagar'>Apagar</button></th>
    </tr>
    </thead>
    <tbody>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["Id_Consulta"] . "</td>";
            echo "<td><a href='Info_paciente_consulta.php?id=" . $row["Id_Paciente"] . "'>" . $row["NomePaciente"] . "</a></td>";
            echo "<td>" . $row["Data"] . "</td>";
            echo "<td>" . $row["Hora"] . "</td>";
            echo "<td>" . $row["Observações"] . "</td>";
            echo "<td><input type='checkbox' name='consulta[]' value='" . $row["Id_Consulta"] . "'></td>";
            echo "<td><input type='checkbox' name='apagar[]' value='" . $row["Id_Consulta"] . "'></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='10'>Nenhuma consulta encontrada.</td></tr>";
    }
    ?>
    </tbody>
</table>
</form>
</body>
</html>


