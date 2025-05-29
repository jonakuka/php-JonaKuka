<?php

$apiKey = 'sk-YOUR_API_KEY_HERE'; // 🔒 Replace with your secret key

// The prompt: user says something emotional
$userMessage = "I feel like no one really understands me.";

// Build the request payload
$data = [
    "model" => "gpt-4o", // or "gpt-3.5-turbo"
    "messages" => [
        ["role" => "system", "content" => "You are an empathetic assistant in a simulator, trained to respond with emotional intelligence and compassion."],
        ["role" => "user", "content" => $userMessage]
    ]
];

// Set up cURL
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.openai.com/v1/chat/completions");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer $apiKey"
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

// Execute the request
$response = curl_exec($ch);
curl_close($ch);

// Decode and display response
$result = json_decode($response, true);
$reply = $result['choices'][0]['message']['content'];

echo "<strong>ChatGPT says:</strong> " . htmlspecialchars($reply);

?>
<form method="post">
    <textarea name="user_input" rows="4" cols="50" placeholder="Say something..."></textarea><br>
    <button type="submit">Send</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['user_input'])) {
    $userMessage = $_POST['user_input'];
    // Insert the cURL code here from above, using $userMessage
}
?>
