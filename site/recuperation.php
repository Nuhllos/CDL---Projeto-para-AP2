<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tokyo Streets | Resetar senha</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/login&signup-style.css">
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
        <div class="formCard">
            <form action="php/recuperation.php" class="form" method="POST">
                <h2>RESETAR SENHA</h2>
                <p>Um email será enviado para você contendo link e instruções em como resetar sua senha</p><br/>
                <?php
                    if (isset($_GET["recuperation_email"])) {
                        if ($_GET["recuperation_email"] === "success") {
                            echo "<h3 class='success'>Link enviado com sucesso, verifique seu email</h3>";
                        }
                    }
                ?>
                <label for="email">Email: </label>
                <input type="email" name="email" id="email" class="email" placeholder="Digite o seu email">
                <input type="submit" name="recuperation" value="Enviar">
            </form>
        </div>
    </section>
    <footer>
        <div class="footer">
            <p>&copy2020 - Faculdade CDL - Todos os direitos reservados</p>
        </div>
    </footer>
    <script src="js/index.js"></script>
</body>
</html>