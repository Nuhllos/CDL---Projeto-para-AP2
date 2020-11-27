<?php
session_start();

include("../db/connection.php");
include("php/rows-query(students).php");

include("modals/edit-data(students).php");

include("modals/delete-data(students).php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculdade CDL | Alunos</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/tables.css">
    <link rel="stylesheet" href="css/modals.css">
</head>
<body>
    <header.>
        <div class="header">
        </div>
        <div class="underHeader">
            <ul>
                <li class="logo"><a href="../index.php"><img src="images/logo-f-cdl.png" alt="Logo CDL" width="150px" height="25px"></a></li>
                <li><a href="courses.php">Cursos</a></li>
                <li><a href="students.php">Alunos</a></li>
                <li><a href="registration.php">Matrículas</a></li>
                <?php
                    if (!isset($_SESSION["authenticated"])):
                ?>
                    <li class="userName"><a href="login.php">Login</a></li>
                    <li class="enter"><a href="signup.php">Cadastrar</a></li>
                <?php
                    endif;
                ?>
                <?php
                    if (isset($_SESSION["authenticated"])):
                ?>
                    <li class="userName"><a href="panel.php"><?php echo $_SESSION["user"];?></a></li>
                    <li class="logout"><a href="php/logout.php">Sair</a></li>
                <?php
                    endif;
                ?>
            </ul>
        </div>
    </header>
    <section>
        <aside>
            <div class="asideColumn">
            </div>
        </aside>
        <div class="sectionCard">
            <div class="table">
                <table class="t01">
                    <tr>
                        <th>Aluno</th>
                        <th>Data de Nascimento</th>
                        <th>Editar</th>
                        <th>Deletar</th>
                    </tr>
                    <tr>
                    <?php
                        while ($rows = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?php echo $rows["user"]; ?></td>
                            <td><?php echo $rows["year"]; ?></td>
                            <td><a href="?edit=<?php echo $rows["user_id"]; ?>"><img src="icons/pencil-24.svg" alt="Edit button"></a></td>
                            <td><a href="?delete=<?php echo $rows["user_id"]; ?>"><img src="icons/trash-24.svg" alt="Trash button"></a></td>
                        </tr>
                    <?php
                        }
                    ?>
                </table>
<!--------------------------------------------------Edit Div-------------------------------------------------->
                <div id="editModal" class="modal">
                    <form action="" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="modalHeader">
                            <span class="close">&times;</span>
                            <h2>Editar</h2>
                        </div>
                        <div class="modalBody">
                            <label for="">Nome</label>
                            <input type="text" name="user" id="" value="<?php echo $user; ?>">
                            <label for="">Data de Nascimento</label>
                            <input type="date" name="date" id="" value="<?php echo $date; ?>">
                            <button type="submit" name="update" class="btn">Salvar</button>
                        </div>
                        <div class="modalFooter">
                            <h3></h3>
                        </div>
                    </form>
                </div>
                <?php
                    if (isset($_GET["edit"])) {
                        echo "<script src='js/modals(edit).js'></script>";
                    }
                ?>
<!------------------------------------------------Delete Modal------------------------------------------------>
                <div id="deleteModal" class="modal">
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="modalHeader">
                            <span class="close1">&times;</span>
                            <h2>Deletar</h2>
                        </div>
                        <div class="modalBody">
                            <h3>Deseja realmente deletar <?php echo $user; ?>?</h3>
                            <button type="submit" name="delete" class="btn">Deletar</button>
                        </div>
                        <div class="modalFooter">
                            <h3></h3>
                        </div>
                    </form>
                </div>
                <?php
                    if (isset($_GET["delete"])) {
                        echo "<script src='js/modals(delete).js'></script>";
                    }
                ?>
<!------------------------------------------------------------------------------------------------------------>
            </div>
        </div>
    </section>
    <footer>
        <div class="footer">
            <p>&copy2020 - Faculdade CDL - Todos os direitos reservados</p>
        </div>
    </footer>
</body>
</html>