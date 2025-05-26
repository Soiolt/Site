<?php
$to = "";
$subject = "Новое сообщение с формы";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST["name"]) ? trim(strip_tags($_POST["name"])) : '';
    $email = isset($_POST["email"]) ? trim(strip_tags($_POST["email"])) : '';
    $userMessage = isset($_POST["message"]) ? trim(strip_tags($_POST["message"])) : '';

    if ($name && $email && $userMessage) {
        $headers = "Content-type: text/html; charset=utf-8 \r\n";
        $message = "<html><body>";
        $message .= "<strong>Имя:</strong> " . $name . "<br />";
        $message .= "<strong>Email:</strong> " . $email . "<br />";
        $message .= "<strong>Сообщение:</strong> " . nl2br($userMessage);
        $message .= "</body></html>";

        if (mail($to, $subject, $message, $headers)) {
            echo "Сообщение успешно отправлено!";
        } else {
            echo "Ошибка при отправке сообщения.";
        }
    } else {
        echo "Пожалуйста, заполните все поля.";
    }
} else {
    exit("Некорректный запрос.");
}
?>