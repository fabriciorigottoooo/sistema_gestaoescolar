<?php
require_once "conexao.php";

echo "<link rel='stylesheet' type='text/css' href='stylesphp.css'>";
echo "<link rel='icon' href='img/logotipo.png' type='image/png'>";
$conn = new mysqli($host, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_aluno = $_POST['nome_aluno'];
    $matricula = $_POST['matricula'];
    $id_classe = $_POST['id_classe'];   
    $contato_aluno = $_POST['contato_aluno'];
}

$sql = "INSERT INTO alunos(nome_aluno,matricula,contato_aluno,id_classe) VALUES
('$nome_aluno', '$matricula','$contato_aluno','$id_classe')";
if ($conn->query($sql) === TRUE) {
    echo "<div style='position: absolute; top: 50%; left: 50%;  transform: translate(-50%, -50%)'>";
    echo "Aluno cadastrado com sucesso! <br> <br> <br>";
} else {
    echo "Erro ao cadastrar aluno: " . $conn->error;
}
echo "<a href='index.html' class='button'>Página Principal</a>";
echo "</div>";
$conn->close();

?>