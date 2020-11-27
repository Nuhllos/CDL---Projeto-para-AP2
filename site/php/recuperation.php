<?php

if (isset($_POST["recuperation"])) {
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "http://localhost/Git-Repositories/Site%20Prototype/site/new-password.php?selector=" .$selector. "&validator=" . bin2hex($token);
    $expires = date("U") + 1800;

    include "../../db/connection.php";

    $email = $_POST["email"];

    $sql = "delete from password_reset where email_reset = ?;";
    $statment = mysqli_stmt_init($connection);

    if (!mysqli_stmt_prepare($statment, $sql)) {
        echo "Houve um erro na pesca do banco de dados, reenvie seu pedido| ERROR-ID: [1]";
        exit();
    } else {
        mysqli_stmt_bind_param($statment, "s", $email);
        mysqli_stmt_execute($statment);
    }

    $sql = "insert into password_reset (email_reset, selector_reset, token_reset, expires_reset) values (?, ?, ?, ?);";

    $statment = mysqli_stmt_init($connection);

    if (!mysqli_stmt_prepare($statment, $sql)) {
        echo "Houve um erro na pesca do banco de dados, reenvie seu pedido| ERROR-ID: [2]";
        exit();
    } else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($statment, "ssss", $email, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($statment);
    }

    mysqli_stmt_close($statment);
    mysqli_close($connection);

    $to = $email;

    $subject = "Resete sua senha";

    $message = "<p>Recebemos um pedido para resetar sua senha. Se você não tiver feito     esse pedido, ignore este email</p><p>O link para resetar sua senha é o seginte:     <br/>";
    $message .= "<a href='" . $url . "'>" . $url . "</a></p>";

    require_once("../PHPMailer/PHPMailerAutoload.php");

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = "465";
    $mail->isHTML();
    $mail->Username = "";
    $mail->Password = "";
    $mail->Setfrom("");
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AddAddress($to);

    $mail->Send();

    header("Location: ../recuperation.php?recuperation_email=success");

} else {
    header("Location: ../login.php");
}
?>