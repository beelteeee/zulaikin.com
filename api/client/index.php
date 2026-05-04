<?php

$lat = 59.9386;  // Санкт-Петербург
$lon = 30.2141;
$cityName = 'Санкт-Петербург';

function getWeather($lat, $lon) {
    $url = "https://api.open-meteo.com/v1/forecast?latitude={$lat}&longitude={$lon}&current_weather=true&timezone=auto";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $httpCode === 200 ? json_decode($response, true) : ['error' => "HTTP $httpCode"];
}

function getWeatherDesc($code) {
    $codes = [
        0=>'☀️ Ясно', 1=>'🌤️ Малооблачно', 2=>'⛅ Переменно', 3=>'☁️ Пасмурно',
        45=>'🌫️ Туман', 51=>'🌧️ Морось', 61=>'🌧️ Дождь', 71=>'❄️ Снег', 95=>'⛈️ Гроза'
    ];
    $code = is_array($code) ? $code[0] : (int)$code;
    return $codes[$code] ?? "❓ Код: $code";
}

$weather = getWeather($lat, $lon);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Погодный информер</title>
    <style>
        body{font-family:Arial,sans-serif;background:#1a1a2e;color:#fff;display:flex;justify-content:center;align-items:center;min-height:100vh;margin:0}
        .card{background:rgba(255,255,255,.1);border-radius:20px;padding:25px;text-align:center;max-width:450px;width:100%}
        .temp{font-size:48px;font-weight:bold;margin:10px 0}
        .error{background:#c62828;padding:12px;border-radius:8px;margin:10px 0}
    </style>
</head>
<body>
    <div class="card">
        <h1>🌤️ Погода</h1>
        <h2><?= htmlspecialchars($cityName) ?></h2>
        <?php if(isset($weather['error'])): ?>
            <div class="error">❌ <?= htmlspecialchars($weather['error']) ?></div>
        <?php elseif(isset($weather['current_weather'])): 
            $cw = $weather['current_weather']; ?>
            <div class="temp"><?= round($cw['temperature']) ?>°C</div>
            <div><?= getWeatherDesc($cw['weathercode']) ?></div>
            <div>💨 <?= round($cw['windspeed']) ?> км/ч</div>
            <div>🕐 <?= date('H:i', strtotime($cw['time'])) ?></div>
        <?php else: ?>
            <div class="error">❌ Нет данных</div>
        <?php endif; ?>
    </div>
</body>
</html>
