<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tokyo Streets | Cadastrar</title>
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
            <form action="php/signup.php" class="form" method="POST">
                <h2>CADASTRO</h2>
                <?php
                    if (isset($_SESSION["signup_status"])):
                ?>
                    <h3 class="success">Cadastro efetuado com sucesso</h3>
                <?php
                    endif;
                    unset($_SESSION["signup_status"]);
                ?>
                <?php
                    if (isset($_SESSION["signned_user"])):
                ?>
                    <h3 class="error">O usuário escolhido já existe. Informe outro e tente novamente</h3>
                <?php
                    endif;
                    unset($_SESSION["signned_user"]);
                ?>
                <?php
                    if (isset($_SESSION["empty_field"])):
                ?>
                    <h3 class="error">Preencha todos os campos</h3>
                <?php
                    endif;
                    unset($_SESSION["empty_field"]);
                ?>
                <label for="user">Usuário: </label>
                <input type="text" name="user" id ="user" class="user" placeholder="Digite o nome de usuario">
                <label for="date">Data de nascimento: </label>
                <input type="date" value="1999-09-09" name="date" id="date" class="date" placeholder="Digite sua data de nascimento">
                <label for="email">Email: </label>
                <input type="email" name="email" id="email" class="email" placeholder="Digite o seu email">
                <label for="password">Senha: </label>
                <input type="password" name="password" id ="password"class="password" placeholder="Digite a senha">
                <input type="submit" value="Enviar">
                <div class="formFooter">
                    <p>Já possui uma conta? <a href="login.php">Entrar</a></p>
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