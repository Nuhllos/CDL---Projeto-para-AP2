<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tokyo Streets | Login</title>
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
            <form action="php/login.php" class="form" method="POST">
                <h1 class="welcome">Bem vindo a Faculdade CDL</h2><br/>
                <h2>LOGIN</h2>
                <?php
                    if (isset($_SESSION["signup_status"])):
                ?>
                    <h3 class="success">Cadastro efetuado com sucesso</h3>
                <?php
                    endif;
                    unset($_SESSION["signup_status"]);
                ?>
                <?php
                    if (isset($_SESSION["unauthenticated"])):
                ?>
                    <h3 class="error">Erro: usuário ou senha inválidos</h3>
                <?php
                    endif;
                    unset($_SESSION["unauthenticated"]);
                ?>
                <?php
                    if (isset($_SESSION["empty_field"])):
                ?>
                    <h3 class="error">Preencha todos os campos</h3>
                <?php
                    endif;
                    unset($_SESSION["empty_field"]);
                ?>
                <?php
                    if (isset($_GET["new-password"])) {
                        if ($_GET["new-password"] === "passwordUpdated") {
                            echo "<h3 class='success'>Senha resetada com sucesso</h3>";
                        }
                    }
                ?>
                <label for="user">Usuário: </label>
                <input type="text" name="user" id ="user" class="user" placeholder="Digite seu nome de usuário">
                <label for="password">Senha: </label>
                <input type="password" name="password" id ="password"class="password" placeholder="Digite sua senha">
                <input type="submit" value="Entrar">
                <div class="formFooter">
                    <p>Não possui uma conta? <a href="signup.php">Cadastrar</a></p>
                    <p>Esqueceu a senha? <a href="recuperation.php" class="reset">Resetar minha senha</a></p>
                </div>
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