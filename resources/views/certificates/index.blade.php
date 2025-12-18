<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>قائمة الشهادات</h1>
        <ul>
            @foreach($students as $student)
                <li>
                
                    <a href="{{ route('certificate.show1', ['student' => $student->id]) }}">عرض شهادة 1</a> |
            
                    <a href="{{ route('certificate.show2', ['student' => $student->id]) }}">عرض شهادة 2</a> |
                
                    <a href="{{ route('certificate.show3', ['student' => $student->id]) }}">عرض شهادة 3</a> |
                
                </li>
            @endforeach
        </ul>
</body>
</html>