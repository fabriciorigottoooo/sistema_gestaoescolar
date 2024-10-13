<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "gestao_escolar";

$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}


$cursos_sql = "SELECT id, nome_curso FROM cursos"; 
$cursos_result = $conn->query($cursos_sql);


$professores_sql = "SELECT id, nome_prof FROM professores"; 
$professores_result = $conn->query($professores_sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Classes</title>
    <link rel="icon" href="img/logotipo.png" type="img/png">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        #aula-form {
            max-width: 500px;
            margin: 40px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        #aula-form label {
            display: block;
            margin-bottom: 10px;
        }

        #aula-form input[type="text"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
            padding-right: 30px;
            transition: border 0.4s ease;
        }

        #aula-form select {
            width: 90%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
            padding-right: 30px;
            transition: border 0.4s ease;
        }

        #aula-form input[type="email"] {
            width: 170px;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
            transition: border 0.4s ease;
        }

        #aula-form input[type="text"]:focus,
        #aula-form input[type="email"]:focus,
        select{
            border: 1px solid black;
        }

        #aula-form input[type="submit"] {
            background-color: #f70404;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color ease 0.3s;
        }

        #aula-form input[type="submit"]:hover {
            background-color: #d60202;
        }

        #aula-form input[type="reset"] {
            background-color: #c4c4c4;
            color: #000;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color ease 0.3s;
        }

        #aula-form input[type="reset"]:hover {
            background-color: #b5b5b5;
        }

        button {
            text-decoration: none;
            background-color: #070505;
            color: #fff;
            padding: 10px 20px;
            cursor: pointer;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color ease 0.3s;
        }

        button a {
            text-decoration: none;
            color: #fff;
            padding: 10px 10px;
        }

        .btns {
            display: flex;
            justify-content: space-evenly;
        }
    </style>
</head>

<body>
    <form id="aula-form" action="cadastrarclasses.php" method="post">
        <h2>Cadastro de Classe</h2>
        <label for="nome">Nome:</label>
        <input type="text" id="classe_id" name="nome_classe" required autocomplete="off"><br><br>
        <label for="id_curso">Curso:</label>
        <select id="id_curso" name="id_curso" required>
            <option value="id_curso">Selecione um curso</option>
            <?php
            if ($cursos_result->num_rows > 0) {
                while($row = $cursos_result->fetch_assoc()) {
                    echo '<option value="' . htmlspecialchars($row["id"]) . '">' . htmlspecialchars($row["nome_curso"]) . '</option>';
                }
            }
            ?>
        </select><br><br>
        <label for="id_professor">Professor:</label>
        <select id="id_professor" name="id_professor" required>
            <option value="id_professor">Selecione um professor</option>
            <?php
            if ($professores_result->num_rows > 0) {
                while($row = $professores_result->fetch_assoc()) {
                    echo '<option value="' . htmlspecialchars($row["id"]) . '">' . htmlspecialchars($row["nome_prof"]) . '</option>';
                }
            }
            ?>
        </select><br><br>
        <div class="btns">
            <input type="submit" value="Cadastrar Aula">
            <input type="reset" value="Limpar">
            <button><a href="index.html">Voltar ao Início</a></button>
        </div>

    </form>
</body>

</html>