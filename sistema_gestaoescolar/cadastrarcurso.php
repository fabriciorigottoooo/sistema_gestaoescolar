<?php
require_once "conexao.php";
echo "<link rel='stylesheet' type='text/css' href='stylesphp.css'>";
echo "<link rel='icon' href='img/logotipo.png' type='image/png'>";

$conn = new mysqli($host, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_curso = $_POST['nome_curso'];
    $descricao = $_POST['descricao'];
    $duracao = $_POST['duracao'];
}

$sql = "INSERT INTO cursos(nome_curso,descricao,duracao) VALUES
('$nome_curso', '$descricao', '$duracao')";
if ($conn->query($sql) === TRUE) {
    echo "<div style='position: absolute; top: 50%; left: 50%;  transform: translate(-50%, -50%)'>";
    
    echo "Curso cadastrado com sucesso! <br> <br> <br>";
} else {
    echo "Erro ao cadastrar curso: " . $conn->error;
}

echo "<a href='index.html' class='button'>Página Principal</a>";
echo "</div>";
$conn->close();

?>