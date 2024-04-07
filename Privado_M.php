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
<?php
echo "<p style='text-align: right'> Dr(a). ".$_SESSION['Nome'].", ".$_SESSION['Id']."  </p>";
?>



