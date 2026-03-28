<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/nav.css', 'resources/js/nav.js'])
    
</head>
<body>
    <nav>
    @include('layouts.nav')
    </nav>
    <main style="padding: 50px; text-align: center;">
    <h1>Chào mừng đến với trang web</h1>
    <p>Đây là phần nội dung chính để tạo khoảng trống cuộn cho trang web.</p>
    <p style="margin-top: 50px;">Hãy cuộn xuống để xem footer.</p>
    <div style="height: 1000px; background-color: #f0f0f0; margin-top: 20px;"></div>
</main>

    <footer>
@include('layouts.footer')
    </footer>








</body>
</html>

