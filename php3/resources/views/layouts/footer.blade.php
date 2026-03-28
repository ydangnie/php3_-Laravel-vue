<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        /* Reset basic styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: #fff;
            color: #000;
            line-height: 1.6;
        }

        /* Main content placeholder */
        main {
            padding: 50px;
            text-align: center;
        }

        /* FOOTER STYLES */
        .main-footer {
            background-color: #000; /* Đen */
            color: #fff; /* Trắng */
            padding: 60px 0 0 0;
            margin-top: 50px; /* Optional spacing */
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
        }

        .footer-column h3 {
            color: #fff;
            font-size: 1.2rem;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        /* Thêm một gạch ngang dưới tiêu đề cột */
        .footer-column h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 40px;
            height: 2px;
            background-color: #fff;
        }

        .footer-brand .footer-logo {
            color: #fff;
            font-size: 1.8rem;
            font-weight: bold;
            text-decoration: none;
            display: block;
            margin-bottom: 15px;
        }

        .footer-brand p {
            color: #bbb; /* Màu xám nhạt cho mô tả */
            margin-bottom: 20px;
        }

        .footer-column ul {
            list-style: none;
        }

        .footer-column ul li {
            margin-bottom: 10px;
        }

        .footer-column ul li a {
            color: #bbb; /* Màu xám nhạt cho liên kết */
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-column ul li a:hover {
            color: #fff; /* Đổi thành trắng khi hover */
        }

        .footer-contact p {
            color: #bbb; /* Màu xám nhạt cho thông tin liên hệ */
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .footer-contact i {
            color: #fff;
            width: 16px;
            text-align: center;
        }

        .social-links {
            margin-top: 25px;
            display: flex;
            gap: 15px;
        }

        .social-icon {
            color: #fff;
            text-decoration: none;
            font-size: 1.2rem;
            width: 35px;
            height: 35px;
            border: 1px solid #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .social-icon:hover {
            background-color: #fff; /* Nền trắng khi hover */
            color: #000; /* Chữ đen khi hover */
        }

        /* FOOTER BOTTOM STYLES */
        .footer-bottom {
            background-color: #111; /* Đen đậm hơn một chút */
            color: #bbb;
            padding: 20px 0;
            margin-top: 40px;
            font-size: 0.9rem;
        }

        .footer-bottom .footer-container {
            grid-template-columns: 1fr; /* 1 cột trên mobile */
            text-align: center;
            gap: 10px;
        }

        .bottom-links {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .bottom-links a {
            color: #bbb;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .bottom-links a:hover {
            color: #fff;
        }

        /* Back to top button styles */
        #back-to-top {
            display: none; /* Initially hidden */
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            background-color: #333; /* Dark gray for a professional look */
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }

        #back-to-top:hover {
            opacity: 1;
        }

        /* MEDIA QUERIES FOR RESPONSIVENESS */
        @media (max-width: 992px) {
            .footer-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .footer-container {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .footer-column h3::after {
                left: 50%;
                transform: translateX(-50%);
            }

            .footer-column .social-links {
                justify-content: center;
            }

            .bottom-links {
                flex-direction: column;
                gap: 10px;
            }

            .bottom-links a {
                display: block;
            }
        }
    </style>
</head>
<body>



<footer class="main-footer">
    <div class="footer-container">
        <div class="footer-column footer-brand">
            <a href="#" class="footer-logo">Công Ty TNHH ABC</a>
            <p>Cung cấp giải pháp phần mềm toàn diện cho doanh nghiệp.</p>
        </div>
        <div class="footer-column">
            <h3>Về chúng tôi</h3>
            <ul>
                <li><a href="#">Giới thiệu</a></li>
                <li><a href="#">Tầm nhìn & Sứ mệnh</a></li>
                <li><a href="#">Đối tác</a></li>
                <li><a href="#">Tuyển dụng</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Dịch vụ</h3>
            <ul>
                <li><a href="#">Phát triển phần mềm</a></li>
                <li><a href="#">Tư vấn IT</a></li>
                <li><a href="#">Thiết kế Web</a></li>
                <li><a href="#">Bảo mật mạng</a></li>
            </ul>
        </div>
        <div class="footer-column footer-contact">
            <h3>Liên hệ</h3>
            <p><i class="fas fa-map-marker-alt"></i> Số 1, Đường X, Phường Y, Quận Z, TP. HCM</p>
            <p><i class="fas fa-phone"></i> +84 123 456 789</p>
            <p><i class="fas fa-envelope"></i> contact@abc.com</p>
            <div class="social-links">
                <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="footer-container">
            <p>&copy; <span id="copyright-year"></span> Công Ty TNHH ABC. Tất cả các quyền được bảo lưu.</p>
            <ul class="bottom-links">
                <li><a href="#">Điều khoản sử dụng</a></li>
                <li><a href="#">Chính sách bảo mật</a></li>
            </ul>
        </div>
    </div>
</footer>

<button id="back-to-top" title="Lên đầu trang"><i class="fas fa-arrow-up"></i></button>

<script>
    // Automatic copyright year
    document.getElementById('copyright-year').innerHTML = new Date().getFullYear();

    // Back to top button functionality
    const backToTopBtn = document.getElementById('back-to-top');

    window.onscroll = function() {
        scrollFunction();
    };

    function scrollFunction() {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            backToTopBtn.style.display = 'block';
        } else {
            backToTopBtn.style.display = 'none';
        }
    }

    // Scroll to top when clicked
    backToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth' // Smooth scroll animation
        });
    });
</script>
</body>
</html>