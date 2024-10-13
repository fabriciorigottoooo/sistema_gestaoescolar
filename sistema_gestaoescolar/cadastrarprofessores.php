<?php
require_once "conexao.php";
echo "<link rel='stylesheet' type='text/css' href='stylesphp.css'>";
echo "<link rel='icon' href='img/logotipo.png' type='image/png'>";

$conn = new mysqli($host, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_prof = $_POST['nome_prof'];
    $especialidade = $_POST['especialidade'];
    $contato_prof = $_POST['contato_prof'];
}

$sql = "INSERT INTO professores(nome_prof,especialidade,contato_prof) VALUES
('$nome_prof', '$especialidade', '$contato_prof')";
if ($conn->query($sql) === TRUE) {
    echo "<div style='position: absolute; top: 50%; left: 50%;  transform: translate(-50%, -50%)'>";
    
    echo "Professor cadastrado com sucesso! <br> <br> <br>";
} else {
    echo "Erro ao cadastrar professor: " . $conn->error;
}
echo "<a href='index.html' class='button'>Página Principal</a>";
echo "</div>";
$conn->close();

?>