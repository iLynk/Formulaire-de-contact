<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$website = $_POST['website'];
$message = $_POST['message'];

if (!empty($email) && !empty($message)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $receiver = "oniliink1812@gmail.com";
        $subject = "Form: $name <$email>";
        $body = "Nom: $name\nEmail: $email\nTéléphone: $phone\nSite Internet: $website\nMessage: $message\n\nCordialement, \n$name";
        $sender = "From: $email";
        if (mail($receiver, $subject, $body, $sender)) {
            echo "Votre message a été envoyé";
        } else {
            echo "Désolé, l'envoi de votre message à échoué..";
        }
    } else {
        echo "Entrez un email valide";
    }
} else {
    echo "Mail et message requis!";
}
