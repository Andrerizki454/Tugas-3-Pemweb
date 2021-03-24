<?php
$message = $_POST["message"];
$name = $_POST["name"];
file_put_contents("chat.txt", "$name : ", FILE_APPEND);
file_put_contents("chat.txt", "$message\n", FILE_APPEND);
?>