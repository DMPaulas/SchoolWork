<?php
session_start();

    if (isset($_GET['action']) AND $_GET['action'] == 'checklogin') {

        $connect = mysqli_connect('localhost', 'root', '','SIM1') or die('Error connecting to the server: ' . mysqli_error($connect));

        $query = "SELECT `Id`, `Nome`, `Morada`, `Foto`, `USERNAME`, `PASSWORD`, `Especialidade` FROM `users` WHERE `USERNAME` = '". $_POST['user'] ."' AND `PASSWORD` = '". hash("sha256", $_POST['pass'] ) ."'";
        $result = mysqli_query ($connect ,$query) or die('The query failed: ' . mysqli_error($connect));
        $array = mysqli_fetch_array($result);

        if ($number = mysqli_num_rows($result) == 1) {
            $_SESSION['authuser'] = 1;
            $_SESSION['Id'] = $array['Id'];
            $_SESSION['Nome'] = $array['Nome'];
            $_SESSION['Username'] = $_POST['user'];
            $_SESSION['foto'] = $array['Foto'];
            $_SESSION['Especialidade'] = $array['Especialidade'];
        } else {
            $_SESSION['authuser'] = 0;
        }
    }

    if (isset($_GET['action']) AND $_GET['action'] == 'CheckRegistoM') {

        $connect = mysqli_connect('localhost', 'root', '','SIM1') or die('Error connecting to the server: ' . mysqli_error($connect));

        $nome = $_POST['nome'];
        $morada = $_POST['morada'];
        $contacto = $_POST['contacto'];
        $username = $_POST['username'];
        $password = hash("sha256", $_POST['password']);
        $especialidade = $_POST['especialidade'];
        $foto = $_FILES['foto']['name'];

        $query5 = "INSERT INTO users(nome,morada,contacto,username,password,foto,especialidade) VALUES ('$nome','$morada','$contacto','$username','$password','$foto','$especialidade')";

        $result5 = mysqli_query ($connect ,$query5)  or die('The query failed: ' . mysqli_error($connect));

        if ($result5 == True) {
            $newUserId = mysqli_insert_id($connect);
                if ($especialidade == 'Cardiologia') {
        // Inserir médico cardiologista na tabela "medico_cardiologista"
                $add = "INSERT INTO medico_cardiologista(User_id) VALUES ('$newUserId')";
                $resultadd = mysqli_query($connect, $add) or die('The query failed: ' . mysqli_error($connect));
            }
        }
        if ($result5) {
            // Move the uploaded file to a specific folder
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES['foto']['name']);
            move_uploaded_file($_FILES['foto']['tmp_name'], $target_file);
        }
    }

    if (isset($_GET['action']) AND $_GET['action'] == 'CheckRegisto') {

    $connect = mysqli_connect('localhost', 'root', '', 'SIM1') or die('Error connecting to the server: ' . mysqli_error($connect));

    $nome = $_POST['nome'];
    $morada = $_POST['morada'];
    $codigo_postal = $_POST['codigo_postal'];
    $distrito = $_POST['distrito'];
    $concelho = $_POST['concelho'];
    $email = $_POST['email'];
    $data_nascimento = $_POST['data_nascimento'];
    $sexo = $_POST['sexo'];
    $nif = $_POST['nif'];
    $lista = $_POST['lista'];
    $foto = $_FILES['foto']['name'];

    $dob = new DateTime($data_nascimento);
    $now = new DateTime();
    $diff = $now->diff($dob);
    $idade = $diff->format("%y");

    $query2 = "INSERT INTO paciente (nome, morada, codigo_postal, distrito, concelho, email, sexo, nif, lista, foto, data_nascimento, idade)
               VALUES ('$nome', '$morada', '$codigo_postal', '$distrito', '$concelho', '$email', '$sexo', '$nif', '$lista', '$foto', '$data_nascimento', '$idade')";

    $result2 = mysqli_query($connect, $query2) or die('The query failed: ' . mysqli_error($connect));

    if ($result2) {
        // Move the uploaded file to a specific folder
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES['foto']['name']);
        move_uploaded_file($_FILES['foto']['tmp_name'], $target_file);
    }
    }

if (isset($_GET['action']) AND $_GET['action'] == 'CheckUpdate') {

        $connect = mysqli_connect('localhost', 'root', '','SIM1') or die('Error connecting to the server: ' . mysqli_error($connect));

        $id = $_POST['id'];
        $idade = $_POST['data_nascimento'];
        $morada = $_POST['morada'];
        $codigo_postal = $_POST['codigo_postal'];
        $distrito = $_POST['distrito'];
        $concelho = $_POST['concelho'];
        $email = $_POST['email'];
        $lista= $_POST['lista'];
        $foto = $_POST['foto'];

        $query4 = "UPDATE `paciente` SET";
        $set = array();

        if(!empty($idade)) {
            $set[] = "`Data_Nascimento` = '" . $connect->real_escape_string($idade) . "'";
        }
        if(!empty($morada)) {
            $set[] = "`Morada` = '" . $connect->real_escape_string($morada) . "'";
        }
        if (!empty($codigo_postal)) {
            $set[] = "`Codigo_Postal` = '" . $connect->real_escape_string($codigo_postal) . "'";
        }
        if (!empty($distrito)) {
            $set[] = "`Distrito` = '" . $connect->real_escape_string($distrito) . "'";
        }
        if (!empty($concelho)) {
            $set[] = "`Concelho` = '" . $connect->real_escape_string($concelho) . "'";
        }
        if (!empty($email)) {
            $set[] = "`Email` = '" . $connect->real_escape_string($email) . "'";
        }
        if (!empty($lista)) {
            $set[] = "`Lista` = '" . $connect->real_escape_string($lista) . "'";
        }
        if (!empty($foto)) {
            $set[] = "`Foto` = '" . $connect->real_escape_string($foto) . "'";
        }
        if (!empty($set)) {
            $query4 .= implode(", ", $set) . " WHERE id = " . (int)$id;
        }


        $result4 = mysqli_query ($connect ,$query4)  or die('The query failed: ' . mysqli_error($connect));
    }
if (isset($_GET['action']) && $_GET['action'] == 'CheckUpdateM') {
    $connect = mysqli_connect('localhost', 'root', '', 'SIM1') or die('Error connecting to the server: ' . mysqli_error($connect));

    $id = $_POST['id'];
    $morada = $_POST['morada'];
    $contacto = $_POST['contacto'];
    $password = $_POST['password'];
    $especialidade = $_POST['especialidade'];
    $foto = $_FILES['foto']['name'];

    $query6 = "UPDATE `users` SET";
    $set1 = array();

    if (!empty($morada)) {
        $set1[] = "`Morada` = '" . $connect->real_escape_string($morada) . "'";
    }
    if (!empty($contacto)) {
        $set1[] = "`Contacto` = '" . $connect->real_escape_string($contacto) . "'";
    }
    if (!empty($password)) {
        $set1[] = "`Password` = '" . $connect->real_escape_string($password) . "'";
    }
    if (!empty($especialidade)) {
        $set1[] = "`Especialidade` = '" . $connect->real_escape_string($especialidade) . "'";
    }

    if (!empty($_FILES['foto']['tmp_name'])) {
        $uploadDir = "uploads/"; // Specify the directory where you want to save the uploaded files
        $uploadFile = $uploadDir . basename($_FILES['foto']['name']);

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadFile)) {
            // File was successfully uploaded, update the database with the new file name
            $set1[] = "`Foto` = '" . $connect->real_escape_string($uploadFile) . "'";
        } else {
            die('Error uploading the file.');
        }
    }

    if (!empty($set1)) {
        $query6 .= implode(", ", $set1) . " WHERE id = " . (int)$id;
    }

    $result6 = mysqli_query($connect, $query6) or die('The query failed: ' . mysqli_error($connect));
}

    if (isset($_GET['action']) AND $_GET['action'] == 'SearchPaciente') {
        $connect = mysqli_connect("localhost", "root", "", "SIM1") or die ("erro a abrir a ligação.");

        $pesquisa = $_POST["pesquisa"];

        $sql = "SELECT `Id`, `Nome` FROM paciente WHERE Nome LIKE '%$pesquisa%'";

        $result7 = mysqli_query($connect, $sql) or die(mysqli_error($connect));
        $array1 = mysqli_fetch_array($result7);

        if ($number = mysqli_num_rows($result7) == 1) {
            $_paciente['authuser'] = 1;
            $_paciente['Id'] = $array1['Id'];
            $_paciente['Nome'] = $array1['Nome'];
        } else {
            $_paciente['authuser'] = 0;
        }
    }

    if (isset($_GET['action']) AND $_GET['action'] == 'CheckConsulta') {

        $connect = mysqli_connect('localhost', 'root', '','SIM1') or die('Error connecting to the server: ' . mysqli_error($connect));

        $id_Paciente = $_POST['id_Paciente'];
        $id_Medico = $_SESSION['Id'];
        $DORPEITO1 = $_POST['DORPEITO1'];
        $DORPEITO2 = $_POST['DORPEITO2'];
        $DORPEITO3 = $_POST['DORPEITO3'];
        $DISPNEIA = $_POST['DISPNEIA'];
        $HIPERTENSO = $_POST['HIPERTENSO'];
        $FUMADOR = $_POST['FUMADOR'];
        $PRESSAO_ARTERIAL = $_POST['PRESSAO_ARTERIAL'];
        $COLESTEROL= $_POST['COLESTEROL'];

        $query8 = "INSERT INTO consulta(Id_Paciente,Id_Medico,DORPEITO1,DORPEITO2,DORPEITO3,DISPNEIA,HIPERTENSO,FUMADOR,PRESSAO_ARTERIAL,COLESTEROL) VALUES ('$id_Paciente','$id_Medico','$DORPEITO1','$DORPEITO2','$DORPEITO3','$DISPNEIA','$HIPERTENSO','$FUMADOR','$PRESSAO_ARTERIAL','$COLESTEROL')";

        $result8 = mysqli_query ($connect ,$query8)  or die('The query failed: ' . mysqli_error($connect));


    }

    if (isset($_GET['action']) AND $_GET['action'] == 'SearchConsulta') {
        $connect = mysqli_connect("localhost", "root", "", "SIM1") or die ("erro a abrir a ligação.");

        $pesquisa = $_POST["pesquisa"];

        $squery9 = "SELECT consulta.Id_Consulta AS `Id_Consulta`, paciente.Nome AS `Nome` FROM consulta JOIN paciente ON paciente.Id = consulta.Id_Paciente WHERE paciente.Nome LIKE '%$pesquisa%'";

        $result9 = mysqli_query($connect, $squery9) or die(mysqli_error($connect));

        $number = mysqli_num_rows($result9);

        if ($number == 1) {
            $_consulta['authuser'] = 1;
            $array2 = mysqli_fetch_array($result9);
            $_consulta['Id'] = $array2['Id_Consulta'];
            $_consulta['Nome'] = $array2['Nome'];
        } else {
            $_consulta['authuser'] = 0;
        }
    }

    if (isset($_GET['action']) AND $_GET['action'] == 'CheckAgendamento') {

        $connect = mysqli_connect('localhost', 'root', '','SIM1') or die('Error connecting to the server: ' . mysqli_error($connect));

        $id_Medico = intval($_POST['Id_MCardiologista']);
        $id_Consulta = $_POST['Id_Consulta'];
        $Data_Agendamento = $_POST['Data_Agendamento'];
        $Hora_Agendamento = $_POST['Hora_Agendamento'];
        $Observações = $_POST['Observações'];
        $query10 = "INSERT INTO agendamento(Id_MCardiologista,Id_Consulta,Data_Agendamento,Hora_Agendamento,Observações) VALUES ('$id_Medico','$id_Consulta','$Data_Agendamento','$Hora_Agendamento','$Observações')";

        $result10 = mysqli_query ($connect ,$query10)  or die('The query failed: ' . mysqli_error($connect));

    }
    if (isset($_GET['action']) AND $_GET['action'] == 'logout'){
        session_unset();
        header("Location: index.php");
        exit();
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css" />
</head>
<body style="font-family: Arial">
<div style="width: 100%;max-width:900px; margin:auto;">
    <div class="logo">
        <img src="logo_medi1.png" alt="Example Image">
    </div>
        <?php

        if (isset($_SESSION['authuser'] ) && $_SESSION['Especialidade'] == 'Admin') {
            include "Privado_A.php";
        }
        else if (isset($_SESSION['authuser'] ) && $_SESSION['Especialidade'] == 'Familia') {
            include "Privado_M.php";
        }
        else if (isset($_SESSION['authuser'] ) && $_SESSION['Especialidade'] == 'Cardiologia') {
            include "Privado_MC.php";
        }
        else {
            include "Publico.php";
        }

        ?>


        <?php
        $action = $_GET['action'] ?? "index";

        switch($action){
            case "index" :
                include("homepage.php");
                break;

            case "checklogin":
                include("checklogin.php");
                break;

            case "showlogin":
                include("showlogin.php");
                break;

            case "Registar_M":
                include("Registar_M.php");
                break;

            case "CheckRegistoM":
                include("CheckRegistoM.php");
                break;

            case "Utilizadores":
                include("Utilizadores.php");
                break;

            case "Registar":
                include("Registar.php");
                break;

            case "CheckRegisto":
                include("CheckRegisto.php");
                break;

            case "ListaPacientes":
                include("ListaPacientes.php");
                break;

            case "SearchPaciente":
                include("SearchPaciente.php");
                break;

            case "MedicoUpdate":
                include("MedicoUpdate.php");
                break;

            case "CheckUpdateM":
                include("CheckUpdateM.php");
                break;

            case "PacienteUpdate":
                include("PacienteUpdate.php");
                break;

            case "CheckUpdate":
                include("CheckUpdate.php");
                break;

            case "RegistoConsulta":
                include("RegistoConsulta.php");
                break;

            case "CheckConsulta":
                include("CheckConsulta.php");
                break;

            case "AgendamentoConsulta":
                include("AgendamentoConsulta.php");
                break;

            case "SearchConsulta":
                include("SearchConsulta.php");
                break;

            case "CheckAgendamento":
                include("CheckAgendamento.php");
                break;

            case "PerfilM":
                include("PerfilM.php");
                break;

            case "ListaConsulta":
                include("ListaConsulta.php");
                break;

            case "ConsultaPorAceitar":
                include("ConsultaPorAceitar.php");
                break;

            case "serviços":
                include("serviços.php");
                break;

            case "contacto":
                include("contacto.php");
                break;

            case "Info_Paciente":
                include("Info_Paciente.php");
                break;

            case "Info_PacienteMF":
                include("Info_PacienteMF.php");
                break;

            case "Info_Paciente_consulta":
                include("Info_Paciente_consulta.php");
                break;

            case "ConsultaAgendada":
                include("ConsultaAgendada.php");
                break;

            case "sobre_nos":
                include("sobre_nos.php");
                break;

            default:
                include("homepage.php");
        }
        ?>
    <div class="footer">
        <table  align="center" style="width: 100%;max-width:900px; margin:auto;">
            <TR style="background-color:#ddd; color:#333333" >
                <TH> © SIM - 2022-2023 </TH>
        </table>
    </div>
</div>
</body>
</html>