<?php

define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DB", "dbcdlweb");

$connection = mysqli_connect(HOST, USER, PASSWORD, DB) or die ("Não foi possivel estabelecer uma conexão");
?>