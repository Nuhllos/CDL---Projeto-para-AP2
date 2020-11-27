<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tokyo Streets</title>
    <link rel="stylesheet" href="site/css/index.css">
</head>
<body>
    <header.>
        <div class="header">
        </div>
        <div class="underHeader">
            <ul>
                <li class="logo"><a href="site/index.php"><img src="site/images/logo-f-cdl.png" alt="Logo CDL" width="150px" height="25px"></a></li>
                <li><a href="site/courses.php">Cursos</a></li>
                <li><a href="site/students.php">Alunos</a></li>
                <li><a href="site/registration.php">Matrículas</a></li>
                <?php
                    if (!isset($_SESSION["authenticated"])):
                ?>
                    <li class="userName"><a href="site/login.php">Login</a></li>
                    <li class="enter"><a href="site/signup.php">Cadastrar</a></li>
                <?php
                    endif;
                ?>
                <?php
                    if (isset($_SESSION["authenticated"])):
                ?>
                    <li class="userName"><a href="site/panel.php"><?php echo $_SESSION["user"];?></a></li>
                    <li class="logout"><a href="site/php/logout.php">Sair</a></li>
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
            <article>
                <div class="articleCard001">

                </div>
            </article>
        </div>
    </section>
    <footer>
        <div class="footer">
            <p>&copy2020 - Faculdade CDL - Todos os direitos reservados</p>
        </div>
    </footer>
    <script src=""></script>
</body>
</html>