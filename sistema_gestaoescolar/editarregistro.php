<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "gestao_escolar";

$conn = new mysqli($host, $username, $password, $dbname);

echo "<link rel='icon' href='img/logotipo.png' type='image/png'>";
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
echo "<h1>Editar Registros</h1>";


function exibirRegistros($conn, $table) {
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

        if ($table == 'cursos'){
            echo "<th>ID</th><th>Curso</th><th>Descrição</th><th>Duração</th><th>Ações</th>";
        } elseif ($table == 'professores'){
            echo "<th>ID</th><th>Nome</th><th>Especialidade</th><th>Email</th><th>Ações</th>";
        } elseif ($table == 'horarios') {
            echo "<th>ID</th><th>Horário de Início</th><th>Horário de Término</th><th>Sala</th><th>Curso</th><th>Classe</th><th>Professor</th><th>Ações</th>";
        } elseif ($table == 'classes') {
            echo "<th>ID</th><th>Nome da Classe</th><th>Curso</th><th>Professor</th><th>Ações</th>";
        } elseif ($table == 'alunos') {
            echo "<th>ID</th><th>Nome do Aluno</th><th>Matrícula</th><th>Contato</th><th>Classe</th><th>Ações</th>";
        } else {
            
            while ($field_info = $result->fetch_field()) {
                echo "<th>" . htmlspecialchars($field_info->name) . "</th>";
            }
            echo "<th>Ações</th>";
        }

        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $key => $cell) {
                echo "<td>" . htmlspecialchars($cell ?? '-') . "</td>";
            }
            echo "<td><a href='editar.php?tabela=" . $table . "&id=" . $row['id'] . "'>Editar</a></td>";
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

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Registros</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
            text-align: center;
        }

        h2 {
            color: #333;
            text-align: justify;
        }

        .form-container {
            display: inline-block;
            text-align: center;
            margin: 0 auto;
            width: 75%;
        }

        form {
            margin: 0;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .table-container {
            display: inline-block;
            text-align: center;
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

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            padding: 10px;
            width: 100%;
            margin-bottom: 20px;
            border: 1px solid #ddd;
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
        }

        .button:hover {
            background-color: #d60202;
        }

        td a {
            text-decoration: none;
            color: #0056b3;
        }

        .button-cancelar {
            font-weight: bold;
            background-color: ##c4c4c4;
            color: #000;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin: 5px;
            border: 1px;
            transition: background-color ease 0.5s;
        }

        .button-cancelar:hover {
            background-color: #b4b4b4;
        }
    </style>
</head>

<body>
    <a href="index.html" class="button-cancelar">Cancelar</a>
</body>

</html>