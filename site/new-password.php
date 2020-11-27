<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tokyo Streets | Nova senha</title>
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
            <?php
                $selector = $_GET["selector"];
                $validator = $_GET["validator"];

                if (empty($selector) || empty($validator)) {
                    echo "Não conseguimos validar o seu pedido";
                } else {
                    if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                        ?>
                            <form action="php/new-password.php" class="form" method="POST">
                                <h2>NOVA SENHA</h2>
                                <?php
                                    if (isset($_GET["new-password"])) {
                                        if ($_GET["new-password"] === "empty") {
                                            echo "<h3 class='error'>Preencha todos os campos</h3>";
                                        } else if ($_GET["new-password"] === "different-password") {
                                            echo "<h3 class='error'>As senhas não batem</h3>";
                                        }
                                    }
                                ?>
                                <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                                <input type="hidden" name="validator" value="<?php echo $validator; ?>">
                                <label for="password">Nova senha: </label>
                                <input type="password" name="password" id="password" class="password" placeholder="Digite uma nova senha">
                                <input type="password" name="password-repeat" id="password-repeat" class="password" placeholder="Digite a senha novamente">
                                <input type="submit" name="new-password-submit" value="Resetar senha">
                            </form>
                        <?php
                    }
                }
            ?>
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