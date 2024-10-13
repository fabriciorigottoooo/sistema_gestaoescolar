<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "gestao_escolar";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

echo "<link rel='icon' href='img/logotipo.png' type='image/png'>";
echo "<link rel='stylesheet' href='styleseditar.css' type='text/css'>";

if (isset($_GET['tabela']) && isset($_GET['id'])) {
    $tabela = $_GET['tabela'];
    $id = $_GET['id'];

    switch ($tabela) {
        case 'cursos':
            $sql = "SELECT * FROM cursos WHERE id = $id";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            echo "<div class='form-container'>";
            echo "<h1>Editar Curso</h1>";
            echo "<form action='editar.php' method='post'>";
            echo "<input type='hidden' name='tabela' value='cursos'>";
            echo "<input type='hidden' name='id' value='$id'>";
            echo "<label for='nome_curso'>Nome do Curso: </label>";
            echo "<input type='text' id='nome_curso' name='nome_curso' value='" . htmlspecialchars($row['nome_curso'], ENT_QUOTES, 'UTF-8') . "' autocomplete='off'>";
            echo "<br><br>";
            echo "<label for='descricao'>Descrição: </label>";
            echo "<input type='text' id='descricao' name='descricao' value='" . htmlspecialchars($row['descricao'], ENT_QUOTES, 'UTF-8') . "' autocomplete='off'>";
            echo "<br><br>";
            echo "<label for='duracao'>Duração: </label>";
            echo "<input type='text' id='duracao' name='duracao' value='" . htmlspecialchars($row['duracao'], ENT_QUOTES, 'UTF-8') . "' style='width: 25px' autocomplete='off'> horas";
            echo "<br><br>";
            echo "<div class='btns-div'>";
            echo "<button type='submit'>Atualizar</button>";
            echo "<button class='btn-voltar'> <a href='editarregistro.php'> Voltar </a> </button>";
            echo "</div>";
            echo "</form>";
            echo "</div>";
            break;

        case 'professores':
            $sql = "SELECT * FROM professores WHERE id = $id";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            echo "<div class='form-container'>";
            echo "<h1>Editar Professor</h1>";
            echo "<form action='editar.php' method='post'>";
            echo "<input type='hidden' name='tabela' value='professores'>";
            echo "<input type='hidden' name='id' value='$id'>";
            echo "<label for='nome_prof'>Nome do Professor: </label>";
            echo "<input type='text' id='nome_prof' name='nome_prof' value='" . htmlspecialchars($row['nome_prof'], ENT_QUOTES, 'UTF-8') . "' autocomplete='off'>";
            echo "<br><br>";
            echo "<label for='especialidade'>Especialidade: </label>";
            echo "<input type='text' id='especialidade' name='especialidade' value='" . htmlspecialchars($row['especialidade'], ENT_QUOTES, 'UTF-8') . "' autocomplete='off'>";
            echo "<br><br>";
            echo "<label for='contato_prof'>Contato: </label>";
            echo "<input type='text' id='contato_prof' name='contato_prof' value='" . htmlspecialchars($row['contato_prof'], ENT_QUOTES, 'UTF-8') . "' autocomplete='off'>";
            echo "<br><br>";
            echo "<div class='btns-div'>";
            echo "<button type='submit'>Atualizar</button>";
            echo "<button class='btn-voltar'> <a href='editarregistro.php'> Voltar </a> </button>";
            echo "</div>";
            echo "</form>";
            echo "</div>";
            break;

        case 'horarios':
            $sql = "SELECT * FROM horarios WHERE id = $id";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            echo "<div class='form-container'>";
            echo "<h1>Editar Horário</h1>";
            echo "<form action='editar.php' method='post'>";
            echo "<input type='hidden' name='tabela' value='horarios'>";
            echo "<input type='hidden' name='id' value='$id'>";
            echo "<label for='horario_inicio'>Horário de Início: </label>";
            echo "<input type='text' id='horario_inicio' name='horario_inicio' value='" . htmlspecialchars($row['horario_inicio'], ENT_QUOTES, 'UTF-8') . "' autocomplete='off'>";
            echo "<br><br>";
            echo "<label for='horario_fim'>Horário de Fim: </label>";
            echo "<input type='text' id='horario_fim' name='horario_fim' value='" . htmlspecialchars($row['horario_fim'], ENT_QUOTES, 'UTF-8') . "' autocomplete='off'>";
            echo "<br><br>";
            echo "<label for='nome_sala'>Sala: </label>";
            echo "<input type='text' id='nome_sala' name='nome_sala' value='" . htmlspecialchars($row['nome_sala'], ENT_QUOTES, 'UTF-8') . "' autocomplete='off'>";
            echo "<br><br>";
            echo "<label for='curso_id'>Nome do Curso: </label>";
            echo "<input type='text' id='curso_id' name='curso_id' value='" . htmlspecialchars($row['curso_id'], ENT_QUOTES, 'UTF-8') . "' autocomplete='off'>";
            echo "<br><br>";
            echo "<label for='professor_id'>Nome do Professor: </label>";
            echo "<input type='text' id='professor_id' name='professor_id' value='" . htmlspecialchars($row['professor_id'], ENT_QUOTES, 'UTF-8') . "' autocomplete='off'>";
            echo "<br><br>";
            echo "<label for='classe_id'>Nome da Classe: </label>";
            echo "<input type='text' id='classe_id' name='classe_id' value='" . htmlspecialchars($row['classe_id'], ENT_QUOTES, 'UTF-8') . "' autocomplete='off'>";
            echo "<br><br>";
            echo "<div class='btns-div'>";
            echo "<button type='submit'>Atualizar</button>";
            echo "<button class='btn-voltar'> <a href='editarregistro.php'> Voltar </a> </button>";
            echo "</div>";
            echo "</form>";
            echo "</div>";
            break;

        case 'classes':
            $sql = "SELECT * FROM classes WHERE id = $id";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            echo "<div class='form-container'>";
            echo "<h1>Editar Classe</h1>";
            echo "<form action='editar.php' method='post'>";
            echo "<input type='hidden' name='tabela' value='classes'>";
            echo "<input type='hidden' name='id' value='$id'>";
            echo "<label for='nome_classe'>Nome da Classe: </label>";
            echo "<input type='text' id='nome_classe' name='nome_classe' value='" . htmlspecialchars($row['nome_classe'], ENT_QUOTES, 'UTF-8') . "' autocomplete='off'>";
            echo "<br><br>";
            echo "<label for='id_curso'>Curso: </label>";
            echo "<input type='text' id='id_curso' name='id_curso' value='" . htmlspecialchars($row['id_curso'], ENT_QUOTES, 'UTF-8') . "' autocomplete='off'>";
            echo "<br><br>";
            echo "<label for='id_prof'>Professor: </label>";
            echo "<input type='text' id='id_professor' name='id_professor' value='" . htmlspecialchars($row['id_professor'], ENT_QUOTES, 'UTF-8') . "' autocomplete='off'>";
            echo "<br><br>";
            echo "<div class='btns-div'>";
            echo "<button type='submit'>Atualizar</button>";
            echo "<button class='btn-voltar'> <a href='editarregistro.php'> Voltar </a> </button>";
            echo "</div>";
            echo "</form>";
            echo "</div>";
            break;

        case 'alunos':
            $sql = "SELECT * FROM alunos WHERE id = $id";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            echo "<div class='form-container'>";
            echo "<h1>Editar Aluno</h1>";
            echo "<form action='editar.php' method='post'>";
            echo "<input type='hidden' name='tabela' value='alunos'>";
            echo "<input type='hidden' name='id' value='$id'>";
            echo "<label for='nome_aluno'>Nome do Aluno: </label>";
            echo "<input type='text' id='nome_aluno' name='nome_aluno' value='" . htmlspecialchars($row['nome_aluno'], ENT_QUOTES, 'UTF-8') . "' autocomplete='off'>";
            echo "<br><br>";
            echo "<label for='matricula'>Matrícula: </label>";
            echo "<input type='text' id='matricula' name='matricula' value='" . htmlspecialchars($row['matricula'], ENT_QUOTES, 'UTF-8') . "' autocomplete='off'>";
            echo "<br><br>";
            echo "<label for='contato_aluno'>Contato: </label>";
            echo "<input type='text' id='contato_aluno' name='contato_aluno' value='" . htmlspecialchars($row['contato_aluno'], ENT_QUOTES, 'UTF-8') . "' autocomplete='off'>";
            echo "<br><br>";
            echo "<label for='id_classe'>Nome da Classe: </label>";
            echo "<input type='text' id='id_classe' name='id_classe' value='" . htmlspecialchars($row['id_classe'], ENT_QUOTES, 'UTF-8') . "' autocomplete='off'>";
            echo "<br><br>";
            echo "<div class='btns-div'>";
            echo "<button type='submit'>Atualizar</button>";
            echo "<button class='btn-voltar'> <a href='editarregistro.php'> Voltar </a> </button>";
            echo "</div>";
            echo "</form>";
            echo "</div>";
            break;

        default:
            echo "Tabela não encontrada";
            break;
    }
}


if (isset($_POST['tabela']) && isset($_POST['id'])) {
    $tabela = $_POST['tabela'];
    $id = $_POST['id'];

    switch ($tabela) {
        case 'cursos':
            $nome_curso = $_POST['nome_curso'];
            $descricao = $_POST['descricao'];
            $duracao = $_POST['duracao'];

            $sql = "UPDATE cursos SET nome_curso = '$nome_curso', descricao = '$descricao', duracao = '$duracao' WHERE id = $id";
            $conn->query($sql);

            echo "<div class='update'>";
            echo "Curso atualizado com sucesso!";
            echo "<br> <br>";
            echo "<button> <img src='img/seta-esquerda.png' style='width: 16px; height: 16px; position: relative; left: -2px; top: 3px;'> <a href='editarregistro.php'> Continuar Editando </a> </button>";
            echo "</div>";
            break;

        case 'professores':
            $nome_prof = $_POST['nome_prof'];
            $especialidade = $_POST['especialidade'];
            $contato_prof = $_POST['contato_prof'];

            $sql = "UPDATE professores SET nome_prof = '$nome_prof', especialidade = '$especialidade', contato_prof = '$contato_prof' WHERE id = $id";
            $conn->query($sql);

            echo "<div class='update'>";
            echo "Professor atualizado com sucesso!";
            echo "<br> <br>";
            echo "<button> <img src='img/seta-esquerda.png' style='width: 16px; height: 16px; position: relative; left: -2px; top: 3px;'> <a href='editarregistro.php'> Continuar Editando </a> </button>";
            echo "</div>";
            break;

        case 'horarios':
            $horario_inicio = $_POST['horario_inicio'];
            $horario_fim = $_POST['horario_fim'];
            $nome_sala = $_POST['nome_sala'];
            $curso_id = $_POST['curso_id'];
            $professor_id = $_POST['professor_id'];
            $classe_id = $_POST['classe_id'];

            $sql = "UPDATE horarios SET horario_inicio = '$horario_inicio', horario_fim = '$horario_fim', nome_sala = '$nome_sala', curso_id = '$curso_id', professor_id = '$professor_id', classe_id = '$classe_id' WHERE id = $id";
            $conn->query($sql);

            echo "<div class='update'>";
            echo "Horário atualizado com sucesso!";
            echo "<br> <br>";
            echo "<button> <img src='img/seta-esquerda.png' style='width: 16px; height: 16px; position: relative; left: -2px; top: 3px;'> <a href='editarregistro.php'> Continuar Editando </a> </button>";
            echo "</div>";
            break;

        case 'classes':
            if (isset($_POST['id_curso'])) {
                $id_curso = $_POST['id_curso'];
                $id_professor = $_POST['id_professor'];
                $nome_classe = $_POST['nome_classe'];

                $sql = "UPDATE classes SET id_curso = '$id_curso', id_professor = '$id_professor', nome_classe = '$nome_classe' WHERE id = $id";
                $conn->query($sql);

                echo "<div class='update'>";
                echo "Classe atualizada com sucesso!";
                echo "<br> <br>";
                echo "<button> <img src='img/seta-esquerda.png' style='width: 16px; height: 16px; position: relative; left: -2px; top: 3px;'> <a href='editarregistro.php'> Continuar Editando </a> </button>";
                echo "</div>";
            } else {
                echo "Error: 'id_curso' is missing.";
            }
            break;

        case 'alunos':
            $nome_aluno = $_POST['nome_aluno'];
            $matricula = $_POST['matricula'];
            $contato_aluno = $_POST['contato_aluno'];
            $id_classe = isset($_POST['id_classe']) ? $_POST['id_classe'] : null;

            $sql = "UPDATE alunos SET nome_aluno = '$nome_aluno', matricula = '$matricula', contato_aluno = '$contato_aluno', id_classe = '$id_classe'  WHERE id = $id";
            $conn->query($sql);

            echo "<div class='update'>";
            echo "Aluno atualizado com sucesso!";
            echo "<br> <br>";
            echo "<button> <img src='img/seta-esquerda.png' style='width: 16px; height: 16px; position: relative; left: -2px; top: 3px;'> <a href='editarregistro.php'> Continuar Editando </a> </button>";
            echo "</div>";

            break;

        default:
            echo "Tabela não encontrada";
            break;
    }
}

$conn->close();
?>