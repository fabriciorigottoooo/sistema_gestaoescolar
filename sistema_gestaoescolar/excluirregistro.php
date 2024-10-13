<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "gestao_escolar";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

if (isset($_GET['id']) && isset($_GET['table'])) {
    $id = intval($_GET['id']);
    $table = $conn->real_escape_string($_GET['table']);

    $sql = "DELETE FROM $table WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "";
    } else {
        echo "<p>Erro ao excluir o registro: " . $conn->error . "</p>";
    }
}
echo "<link rel='icon' href='img/logotipo.png' type='image/png'>";

echo "<h1>Excluir Registros</h1>";

function exibirRegistros($conn, $table)
{
    $cabecalhos = [
        'cursos' => ['ID', 'Curso', 'Descrição', 'Duração (horas)', 'Ações'],
        'professores' => ['ID', 'Nome do Professor', 'Especialidade', 'Email', 'Ações'],
        'horarios' => ['ID', 'Horário de Início', 'Término', 'Sala', 'Curso', 'Classe', 'Professor', 'Ações'],
        'classes' => ['ID', 'Nome da Classe', 'Curso', 'Professor', 'Ações'],
        'alunos' => ['ID', 'Nome do Aluno', 'Matrícula', 'Contato', 'Classe', 'Ações']
    ];

    $sql = "";
    switch ($table) {
        case 'cursos':
            $sql = "SELECT * FROM cursos";
            break;
        case 'professores':
            $sql = "SELECT * FROM professores";
            break;
        case 'horarios':
            $sql = "SELECT h.id, h.horario_inicio, h.horario_fim, h.nome_sala, 
                           c.nome_curso, cl.nome_classe, p.nome_prof 
                    FROM horarios h 
                    LEFT JOIN cursos c ON h.curso_id = c.id 
                    LEFT JOIN classes cl ON h.classe_id = cl.id 
                    LEFT JOIN professores p ON h.professor_id = p.id";
            break;
        case 'classes':
            $sql = "SELECT cl.id, cl.nome_classe, c.nome_curso, p.nome_prof 
                    FROM classes cl 
                    LEFT JOIN cursos c ON cl.id_curso = c.id 
                    LEFT JOIN professores p ON cl.id_professor = p.id";
            break;
        case 'alunos':
            $sql = "SELECT a.id, a.nome_aluno, a.matricula, a.contato_aluno, 
                           cl.nome_classe 
                    FROM alunos a 
                    LEFT JOIN classes cl ON a.id_classe = cl.id";
            break;
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div class='table-container'>";
        echo "<h2>" . ucfirst($table) . "</h2>";
        echo "<table border='1'><tr>";

        foreach ($cabecalhos[$table] as $cabecalho) {
            echo "<th>" . htmlspecialchars($cabecalho) . "</th>";
        }
        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $key => $cell) {
                echo "<td>" . htmlspecialchars($cell ?? '-') . "</td>"; 
            }
            echo "<td><a href='?id=" . $row['id'] . "&table=" . $table . "' onclick=\"return confirm('Tem certeza que deseja excluir este registro?');\">Excluir</a></td>";
            echo "</tr>";
        }

        echo "</table><br>";
        echo "</div><br><br><br>";
    } else {
        echo "<p>Nenhum registro encontrado na tabela " . ucfirst($table) . ".</p><br>";
    }
}


$tabelas = ['cursos', 'professores', 'horarios', 'classes', 'alunos'];
foreach ($tabelas as $table) {
    exibirRegistros($conn, $table);
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
            text-align: center;
        }

        h1 {
            text-align: center;
        }

        h2 {
            color: #333;
        }

        .table-container {
            display: inline-block;
            text-align: justify;
            margin: 0 auto;
            width: 75%;
        }

        table {
            width: 100%;
            margin: 0;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #d60202;
            font-weight: bold;
        }

        a:hover {
            text-decoration: none;
        }

        .button {
            background-color: #f70404;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin: 5px;
            transition: background-color ease 0.3s;
        }

        .button:hover {
            background-color: #d60202;
        }

        .button-cancelar {
            background-color: #c4c4c4;
            color: #000;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin: 5px;
            transition: background-color ease 0.3s;
        }

        .button-cancelar:hover {
            background-color: #b4b4b4;
        }
    </style>
</head>

<body>
    <a href="index.html" class="button">Concluído</a>
    <a href="index.html" class="button-cancelar">Cancelar</a>
</body>

</html>