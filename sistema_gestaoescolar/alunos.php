<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "gestao_escolar";

$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}


$classes_sql = "SELECT id, nome_classe FROM classes"; 
$classes_result = $conn->query($classes_sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Alunos</title>
    <link rel="icon" href="img/logotipo.png" type="img/png">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        #aluno-form {
            max-width: 500px;
            margin: 40px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        #aluno-form label {
            display: block;
            margin-bottom: 10px;
        }

        #aluno-form input[type="text"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
            padding-right: 30px;
            transition: border 0.4s ease;
        }

        #aluno-form input[type="email"] {
            width: 170px;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
            transition: border 0.4s ease;
        }

        #aluno-form input[type="submit"] {
            background-color: #f70404;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color ease 0.3s;
        }

        #aluno-form input[type="submit"]:hover {
            background-color: #d60202;
        }

        #aluno-form input[type="reset"] {
            background-color: #c4c4c4;
            color: #000;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color ease 0.3s;
        }

        #aluno-form input[type="reset"]:hover {
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

        #aluno-form input[type="number"] {
            width: 20%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
            padding-right: 10px;
            transition: border 0.4s ease;
        }

        #aluno-form select {
            width: 90%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
            padding-right: 30px;
            transition: border 0.4s ease;
        }

        #aluno-form input[type="text"]:focus,
        #aluno-form input[type="email"]:focus,
        #aluno-form input[type="number"]:focus,
        select{
            border: 1px black solid;
        }
    </style>
</head>

<body>
    <form id="aluno-form" action="cadastraralunos.php" method="post">
        <h2>Cadastro de Aluno</h2>
        <label for="nome">Nome do Aluno:</label>
        <input type="text" id="nome_aluno_id" name="nome_aluno" required autocomplete="off"><br><br>
        <label for="matricula">Matrícula (RM):</label>
        <input type="number" id="matricula_id" name="matricula" required autocomplete="off"><br><br>
        <label for="id_classe">Classe:</label>
        <select name="id_classe" id="id_classe">
            <option value="id_classe">Selecione uma Classe</option>
            <?php
            if ($classes_result->num_rows > 0) {
                while($row = $classes_result->fetch_assoc()) {
                    echo '<option value="' . htmlspecialchars($row["id"]) . '">' . htmlspecialchars($row["nome_classe"]) . '</option>';
                }
            }
            ?>
        </select> <br> <br>
        <label for="contato">Email de Contato:</label>
        <input type="email" id="contato_aluno_id" name="contato_aluno" required autocomplete="off"
            placeholder="Ex.: aluno@etec.sp.gov.br"><br><br>
        <div class="btns">
            <input type="submit" value="Cadastrar Aluno">
            <input type="reset" value="Limpar">
            <button><a href="index.html">Voltar ao Início</a></button>
        </div>

    </form>
</body>

</html>