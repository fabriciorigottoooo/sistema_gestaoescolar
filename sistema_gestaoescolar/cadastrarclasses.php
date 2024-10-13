<?php
require_once "conexao.php";

echo "<link rel='stylesheet' type='text/css' href='stylesphp.css'>";
echo "<link rel='icon' href='img/logotipo.png' type='image/png'>";
$conn = new mysqli($host, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_classe = $_POST['nome_classe'];
    $id_curso = $_POST['id_curso'];
    $id_professor = $_POST['id_professor'];
}

$sql = "INSERT INTO classes(nome_classe, id_curso, id_professor) VALUES
('$nome_classe', '$id_curso', '$id_professor')";
if ($conn->query($sql) === TRUE) {
    echo "<div style='position: absolute; top: 50%; left: 50%;  transform: translate(-50%, -50%)'>";
    
    echo "Classe cadastrada com sucesso! <br> <br> <br>";
} else {
    echo "Erro ao cadastrar classe: " . $conn->error;
}
echo "<a href='index.html' class='button'>Página Principal</a>";
echo "</div>";
$conn->close();
?>