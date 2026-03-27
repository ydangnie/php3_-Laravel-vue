<style scoped>
/* Reset CSS cơ bản */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
    background-color: #f9f9f9; /* Nền trang hơi xám để làm nổi bật navbar */
}

/* Kiểu dáng Navbar chính */
.navbar {
    background-color: #000000;
    color: #ffffff;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 40px;
}

.navbar .logo {
    font-size: 24px;
    font-weight: bold;
    letter-spacing: 2px;
}

.nav-links {
    list-style: none;
    display: flex;
    align-items: center;
}

.nav-links li {
    margin-left: 20px;
    position: relative; /* Để định vị dropdown con */
}

.nav-links a {
    color: #ffffff;
    text-decoration: none;
    font-size: 16px;
    padding: 8px 12px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

/* Hiệu ứng hover cho menu chính: Đảo ngược trắng đen */
.nav-links a:hover {
    background-color: #ffffff;
    color: #000000;
}

/* Kiểu dáng Dropdown Menu */
.dropdown-content {
    display: none; /* Ẩn mặc định, JS sẽ kích hoạt */
    position: absolute;
    background-color: #ffffff;
    min-width: 180px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    top: 100%;
    left: 0;
    margin-top: 10px;
    list-style: none;
    z-index: 1000;
    border: 1px solid #000000;
}

.dropdown-content li {
    margin-left: 0;
}

.dropdown-content a {
    color: #000000;
    padding: 12px 16px;
    display: block;
}

/* Hiệu ứng hover cho dropdown: Đảo ngược trắng đen */
.dropdown-content a:hover {
    background-color: #000000;
    color: #ffffff;
}


.show {
    display: block;
}
</style>

<template>

    <body>

        <nav class="navbar">
            <div class="logo">BRAND</div>
            <ul class="nav-links">
                <li><a href="">Trang chủ</a></li>
                <li><a href="#">Giới thiệu</a></li>
                <li class="dropdown">
                    <a href="#" class="dropbtn" id="dropbtn">Dịch vụ ▼</a>
                    <ul class="dropdown-content" id="myDropdown">
                        <li><a href="#">Thiết kế Web</a></li>
                        <li><a href="#">Marketing</a></li>
                        <li><a href="#">SEO</a></li>
                    </ul>
                </li>
                <li><a href="#">Liên hệ</a></li>
            </ul>
        </nav>


    </body>
</template>

<script setup>
document.addEventListener('DOMContentLoaded', () => {
    const dropbtn = document.getElementById('dropbtn');
    const dropdownContent = document.getElementById('myDropdown');

    // Mở/Đóng dropdown khi click vào nút
    dropbtn.addEventListener('click', (event) => {
        event.preventDefault(); // Ngăn trang bị cuộn lên đầu khi click thẻ a
        dropdownContent.classList.toggle('show');
    });

    // Đóng dropdown khi click ra bất kỳ vị trí nào khác trên màn hình
    window.addEventListener('click', (event) => {
        if (!event.target.matches('.dropbtn')) {
            if (dropdownContent.classList.contains('show')) {
                dropdownContent.classList.remove('show');
            }
        }
    });
});</script>
