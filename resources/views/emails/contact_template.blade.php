<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>وصلتك رسالة جديدة من نموذج "اتصل بنا"</h3>
<p><strong>الاسم:</strong> {{ $data['name'] }}</p>
<p><strong>البريد:</strong> {{ $data['email'] }}</p>
<p><strong>الموضوع:</strong> {{ $data['subject'] }}</p>
<p><strong>الرسالة:</strong></p>
<p>{{ $data['message'] }}</p>
</body>
</html>