<?php
if ($result8 = True) {
    $connect = mysqli_connect('localhost', 'root', '','SIM1') or die('Error connecting to the server: ' . mysqli_error($connect));
    $query1 = "SELECT * FROM consulta JOIN paciente ON consulta.Id_Paciente = paciente.id WHERE paciente.id = '".$_POST['id_Paciente']."'";
    $result1 = mysqli_query ($connect ,$query1) or die('The query failed: ' . mysqli_error($connect));
    $array = mysqli_fetch_array($result1);
}

?>
<html lang="en">
<head>
    <title>Registo de Consulta</title>
</head>
<body>
<header style="margin-top: 50px;">
    <h2 align="center">Registo de Consulta</h2>
</header>
<main>
    <fieldset>
        <legend>Dados do Paciente</legend>
        <label for="Nome">Nome:</label> <?php echo $array["Nome"]; ?><br><br>
        <label for="Sexo">Género:</label> <?php echo $array["Sexo"]; ?><br><br>
        <label for="idade">Idade:</label> <?php echo $array["idade"]; ?><br><br>
    </fieldset><br><br>
    <fieldset>
        <legend>Sintomas</legend>
        <label for="DORPEITO1">Desconforto no tórax/pescoço/mandíbula/ombro/braço (Sim - 1 / Não - 0):</label> <?php echo $array["DORPEITO1"]; ?>  <br><br>
        <label for="DORPEITO2">Dor no peito desencadeada pelo exercício (Sim - 1 / Não - 0):</label> <?php echo $array["DORPEITO2"]; ?> <br><br>
        <label for="DORPEITO3">Dor no peito aliviada pelo repouso ou nitratos em 5min. (Sim - 1 / Não - 0):</label> <?php echo $array["DORPEITO3"]; ?> <br><br>
        <label for="DISPNEIA">Sensação de falta de ar (Sim - 1 / Não - 0):</label> <?php echo $array["DISPNEIA"]; ?> <br><br>
        <label for="HIPERTENSO">Tensão alta (Sim - 1 / Não - 0):</label> <?php echo $array["HIPERTENSO"]; ?> <br><br>
        <label for="FUMADOR">Fumador (Sim - 1 / Não - 0):</label> <?php echo $array["FUMADOR"]; ?> <br><br>
        <label for="PRESSAO_ARTERIAL">Pressão arterial:</label> <?php echo $array["PRESSAO_ARTERIAL"]; ?><br><br>
        <label for="COLESTEROL">Valor de Colesterol:</label> <?php echo $array["COLESTEROL"]; ?><br><br>
    </fieldset><br><br>

        <fieldset>
            <legend>SAD Avaliação</legend>
            <?php
            if (($array["DORPEITO2"] == 1) && ($array["Sexo"] == 1) && ($array["idade"] <= 41.5)) {
                $terminalNode = -1;
                $class = 2;
                $probClass1 = 0;
                $probClass2 = 45.88;
                $probClass3 = 54.16;
            } elseif (($array["DORPEITO2"] == 1) && ($array["Sexo"] == 1) && ($array["idade"] > 41.5) && ($array["idade"] <= 57.5)) {
                $terminalNode = -2;
                $class = 3;
                $probClass1 = 0;
                $probClass2 = 18.30;
                $probClass3 = 81.70;
            } elseif (($array["DORPEITO2"] == 0) && ($array["Sexo"] == 1) && ($array["idade"] <= 57.5) && ($array["COLESTEROL"] <= 235)) {
                $terminalNode = -3;
                $class = 2;
                $probClass1 = 8.16;
                $probClass2 = 53.07;
                $probClass3 = 38.77;
            } elseif (($array["DORPEITO2"] == 0) && ($array["Sexo"] == 1) && ($array["idade"] <= 57.5) && ($array["COLESTEROL"] > 235)) {
                $terminalNode = -4;
                $class = 3;
                $probClass1 = 0;
                $probClass2 = 10;
                $probClass3 = 90;
            } elseif (($array["Sexo"] == 1) && ($array["idade"] > 57.5)) {
                $terminalNode = -5;
                $class = 3;
                $probClass1 = 0;
                $probClass2 = 13.33;
                $probClass3 = 86.67;
            } elseif (($array["DORPEITO2"] == 1) && ($array["DORPEITO1"] == 1) && ($array["DORPEITO3"] == 1) && ($array["Sexo"] == 0) && ($array["idade"] <= 49.5)) {
                $terminalNode = -6;
                $class = 1;
                $probClass1 = 1;
                $probClass2 = 0;
                $probClass3 = 0;
            } elseif (($array["DORPEITO2"] == 0) && ($array["DORPEITO1"] == 1) && ($array["DORPEITO3"] == 1) && ($array["Sexo"] == 0) && ($array["idade"] <= 49.5)) {
                $terminalNode = -7;
                $class = 2;
                $probClass1 = 0;
                $probClass2 = 52.95;
                $probClass3 = 47.05;
            } elseif (($array["DORPEITO1"] == 1) && ($array["DORPEITO3"] == 1) && ($array["Sexo"] == 0) && ($array["idade"] > 49.5)) {
                $terminalNode = -8;
                $class = 2;
                $probClass1 = 0;
                $probClass2 = 45.23;
                $probClass3 = 54.77;
            } elseif (($array["DORPEITO2"] == 1) && ($array["DORPEITO1"] == 0) && ($array["DORPEITO3"] == 1) && ($array["Sexo"] == 0)) {
                $terminalNode = -9;
                $class = 3;
                $probClass1 = 0;
                $probClass2 = 27.58;
                $probClass3 = 72.42;
            } elseif (($array["DORPEITO2"] == 0) && ($array["DORPEITO1"] == 0) && ($array["DORPEITO3"] == 1) && ($array["Sexo"] == 0)) {
                $terminalNode = -10;
                $class = 1;
                $probClass1 = 97.22;
                $probClass2 = 0;
                $probClass3 = 2.78;
            } elseif (($array["DORPEITO3"] == 1) && ($array["DORPEITO1"] == 1) && ($array["DORPEITO2"] == 0) && ($array["Sexo"] == 0)) {
                $terminalNode = -11;
                $class = 3;
                $probClass1 = 0;
                $probClass2 = 21.88;
                $probClass3 = 78.12;
            } elseif (($array["DORPEITO3"] == 0) && ($array["DORPEITO1"] == 1) && ($array["DORPEITO2"] == 0) && ($array["Sexo"] == 0)) {
                $terminalNode = -12;
                $class = 1;
                $probClass1 = 96.97;
                $probClass2 = 3.03;
                $probClass3 = 0;
            } elseif (($array["DORPEITO2"] == 0) && ($array["DORPEITO3"] == 0) && ($array["Sexo"] == 0)) {
                $terminalNode = -13;
                $class = 1;
                $probClass1 = 76.32;
                $probClass2 = 0;
                $probClass3 = 23.68;
            }else {
                $class = 0;
            }

            if ($class == 1) {
                echo "Não existe muitos indicios de perigo eminente <br><br>";
                echo "Percentagem de decisão: <br><br>";
                echo " &nbsp &nbsp Não existe pergio iminente: &nbsp" . $probClass1. "% <br><br>";
                echo " &nbsp &nbsp Realização de ANGIO TC: &nbsp" . $probClass2. "% <br><br>";
                echo " &nbsp &nbsp Realização de TAC: &nbsp" . $probClass3 . "% <br><br>";
            }elseif ($class == 2){
                echo "Recomendado a realização de um exame de Angiotomografia (ANGIO TC)";
                echo "Percentagem de decisão: <br><br>";
                echo " &nbsp &nbsp Não existe pergio iminente: &nbsp" . $probClass1. "% <br><br>";
                echo " &nbsp &nbsp Realização de ANGIO TC: &nbsp" . $probClass2. "% <br><br>";
                echo " &nbsp &nbsp Realização de TAC: &nbsp" . $probClass3 . "% <br><br>";
            }elseif ($class == 3){
                echo "Recomendado a realização de um exame de Tomografia Computorizada (TAC) <br><br>";
                echo "Percentagem de decisão: <br><br>";
                echo " &nbsp &nbsp Não existe pergio iminente: &nbsp" . $probClass1. "% <br><br>";
                echo " &nbsp &nbsp Realização de ANGIO TC: &nbsp" . $probClass2. "% <br><br>";
                echo " &nbsp &nbsp Realização de TAC: &nbsp" . $probClass3 . "% <br><br>";
            } else {
                echo "Paciente encontra-se fora de perigo";}

            $connect = mysqli_connect('localhost', 'root', '','SIM1') or die('Error connecting to the server: ' . mysqli_error($connect));
            $query2 = "UPDATE consulta SET Valor_Col = '$class' WHERE Id_Paciente = '".$_POST['id_Paciente']."'";
            $result2 = mysqli_query ($connect ,$query2)  or die('The query failed: ' . mysqli_error($connect));
            ?>

        </fieldset><br><br>

    </form>
</main>
</body>
</html>