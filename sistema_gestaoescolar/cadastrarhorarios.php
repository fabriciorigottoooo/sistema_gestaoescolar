<?php
require_once "conexao.php";
echo "<link rel='stylesheet' type='text/css' href='stylesphp.css'>";
echo "<link rel='icon' href='img/logotipo.png' type='image/png'>";

$conn = new mysqli($host, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $curso_id = $_POST['curso_id'];
    $professor_id = $_POST['professor_id'];
    $classe_id = $_POST['classe_id'];
    $horario_inicio = $_POST['horario_inicio'];
    $horario_fim = $_POST['horario_fim'];
    $nome_sala = $_POST['nome_sala'];
}

$sql = "INSERT INTO horarios(curso_id,professor_id,classe_id,horario_inicio,horario_fim,nome_sala) VALUES
('$curso_id','$professor_id','$classe_id','$horario_inicio', '$horario_fim', '$nome_sala')";
if ($conn->query($sql) === TRUE) {
    echo "<div style='position: absolute; top: 50%; left: 50%;  transform: translate(-50%, -50%)'>";
    
    echo "Horário de Aula cadastrado com sucesso! <br> <br> <br>";
} else {
    echo "Erro ao cadastrar horário: " . $conn->error;
}
echo "<a href='index.html' class='button'>Página Principal</a>";
echo "</div>";
$conn->close();

?>