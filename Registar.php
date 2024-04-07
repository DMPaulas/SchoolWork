<html lang="en">
<head>
    <title>Registo de Paciente</title>
</head>
<body>
<header style="margin-top: 50px;">
    <h2 align="center">Registo de Paciente</h2>
</header>
<main>
    <form action="index.php?action=CheckRegisto" method="POST" style="margin-bottom: 50px;" enctype="multipart/form-data">
        <fieldset>
            <legend>Dados Pessoais</legend>
            <label for="nome">Nome completo:</label>
            <input type="text" id="nome" name="nome">
            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento">
            <label for="sexo">Sexo:</label>
            <select id="sexo" name="sexo">
                <option value="">Selecione...</option>
                <option value="1">Masculino</option>
                <option value="0">Feminino</option>
            </select><br><br>
            <label for="nif">NIF:</label>
            <input type="number" id="nif" name="nif">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email"><br><br>
            <label for="morada">Morada:</label>
            <input type="text" id="morada" name="morada">
            <label for="codigo_postal">Codigo-Postal:</label>
            <input type="text" id="codigo_postal" name="codigo_postal">
            <label for="distrito">Distrito:</label>
            <input type="text" id="distrito" name="distrito"><br><br>
            <label for="concelho">Concelho:</label>
            <input type="text" id="concelho" name="concelho"><br><br>
            <label for="lista">Lista:</label>
            <textarea id="lista" name="lista" rows="4" cols="50"></textarea>
        </fieldset>
        <fieldset>
            <legend>Foto</legend>
            <input class="file-upload-input" type="file" onchange="readURL(this)" accept="Image/*" name="foto" id="foto">
        </fieldset>
        <button type="submit">Registar Paciente</button>
    </form>
</main>
</body>
</html>
