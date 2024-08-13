<?php
$webhook_url = 'https://discord.com/api/webhooks/1272887133434023937/Y7omG1m8BOh70TScHg-2wVd3ACgu_KSiGJZC-S30BagcygHX--lLOcIDlZfa32P1SadF'; // Замените на ваш URL webhook

// Получение IP-адреса посетителя
$ip_address = $_SERVER['REMOTE_ADDR'];

// Сообщение для отправки на вебхук
$data = array(
    "content" => "Новый пользователь! IP: " . $ip_address
);

// Опции для HTTP-запроса
$options = array(
    'http' => array(
        'header'  => "Content-type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ),
);

// Отправка запроса на вебхук
$context  = stream_context_create($options);
$result = file_get_contents($webhook_url, false, $context);

if ($result === FALSE) {
    // Обработка ошибок
}

// Перенаправление на Discord сервер
header("Location: https://discord.gg/Hdmt6B2fES");
exit;
?>
