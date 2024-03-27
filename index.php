<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulário de Cadastro</title>
        
</head>
<body>
    <div class="container">
        <h2>Formulário de Cadastro</h2>
        <form action="" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" placeholder="000.000.000-00" required>

            <label for="data">Data de Nascimento:</label>
            <input type="date" id="data" name="data" required>

            <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" name="telefone" pattern="\([0-9]{2}\) [0-9]{4,5}-[0-9]{4}" placeholder="(00) 12345-6789" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="">Selecione</option>
                <option value="ativo">sim</option>
                <option value="inativo">não</option>
            </select>

            <button type="submit">Enviar</button>
        </form>
    </div>
    <?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $data_nascimento = $_POST["data"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];

    
    $data_nascimento = new DateTime($data_nascimento);
    $hoje = new DateTime();
    $idade = $hoje->diff($data_nascimento)->y;

   
    $status = isset($_POST["status"]) ? $_POST["status"] : "Não informado";

    
    $estudante = isset($_POST["estudante"]) ? "Sim" : "Não";

    
    $mensagem = "Eu $nome, $estudante sou estudante. Meu número de CPF é $cpf, nasci em " . $data_nascimento->format('d/m/Y') . " e tenho $idade anos de idade. Meu telefone para contato é $telefone e meu e-mail é $email.";

    
    echo "<h2>Mensagem Enviada:</h2>";
    echo "<p>$mensagem</p>";
} elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
   
    echo "<h2>Erro!</h2>";
    echo "<p>Formulário não enviado.</p>";
} else {
    
    header("Location: formulario.html");
    exit;
}

?>


</body>
</html>
