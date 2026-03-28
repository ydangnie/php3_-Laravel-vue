<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Trắng Đen Chuyên Nghiệp</title>
    <style>
        /* Reset cơ bản */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --bg-color: #ffffff;
            --text-color: #000000;
            --hover-bg: #f5f5f5;
            --border-color: #e0e0e0;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            line-height: 1.6;
        }

        /* Navbar Style */
        .navbar {
            background-color: var(--bg-color);
            border-bottom: 1px solid var(--border-color);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;

        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            height: 70px;
        }

        .nav-logo {
            font-size: 1.5rem;
            font-weight: 800;
            text-decoration: none;
            color: var(--text-color);
            letter-spacing: 1px;
            margin-left: -110px;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            align-items: center;
            margin-right: -110px;
        }

        .nav-link {
            text-decoration: none;
            color: var(--text-color);
            font-weight: 500;
            padding: 0.5rem 1rem;
            position: relative;
            transition: color 0.3s ease;

        }

        /* Hiệu ứng gạch chân tối giản khi hover */
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background-color: var(--text-color);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 80%;
        }

        /* Dropdown Menu Chuyên Nghiệp */
        .dropdown {
            position: relative;
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            background-color: var(--bg-color);
            border: 1px solid var(--border-color);
            min-width: 220px;
            list-style: none;
            opacity: 0;
            visibility: hidden;
            transform: translateY(15px);
            transition: all 0.3s ease;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.05);
        }

        .dropdown:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-link {
            display: block;
            padding: 1rem 1.5rem;
            text-decoration: none;
            color: var(--text-color);
            font-size: 0.95rem;
            transition: background-color 0.2s ease, padding-left 0.2s ease;
        }

        .dropdown-link:hover {
            background-color: var(--hover-bg);
            padding-left: 2rem;
            /* Hiệu ứng đẩy text nhẹ khi hover */
        }

        /* Mobile Menu Toggle */
        .menu-toggle {
            display: none;
            flex-direction: column;
            cursor: pointer;
        }

        .bar {
            width: 25px;
            height: 2px;
            background-color: var(--text-color);
            margin: 4px 0;
            transition: 0.3s;
        }

        /* Giả lập Section */
        section {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 2.5rem;
            border-bottom: 1px solid var(--border-color);
        }

        section:nth-child(even) {
            background-color: #fafafa;
        }

        /* Responsive cho Mobile */
        @media (max-width: 768px) {
            .menu-toggle {
                display: flex;
            }

            .nav-menu {
                position: absolute;
                top: 70px;
                left: -100%;
                flex-direction: column;
                background-color: var(--bg-color);
                width: 100%;
                text-align: center;
                transition: 0.3s ease;
                border-bottom: 1px solid var(--border-color);
            }

            .nav-menu.active {
                left: 0;
            }

            .nav-menu li {
                width: 100%;
            }

            .nav-link {
                display: block;
                padding: 1.5rem;
            }

            .dropdown-menu {
                position: relative;
                box-shadow: none;
                border: none;
                background-color: var(--hover-bg);
                display: none;
            }

            .dropdown.active .dropdown-menu {
                display: block;
                opacity: 1;
                visibility: visible;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="nav-container">
            <a href="#home" class="nav-logo"><img
                    src="https://theme.hstatic.net/1000306633/1001194548/14/logo.png?v=506" alt="" width="200px"></a>



            <ul class="nav-menu">
                <li><a href="#home" class="nav-link">Trang chủ</a></li>
                <li><a href="#about" class="nav-link">Giới thiệu</a></li>

                <li class="nav-item dropdown">
                    <a href="#services" class="nav-link dropdown-toggle">Dịch vụ ▼</a>
                    <ul class="dropdown-menu">
                        <li><a href="#web" class="dropdown-link">Thiết kế Web</a></li>
                        <li><a href="#seo" class="dropdown-link">SEO Marketing</a></li>
                        <li><a href="#consulting" class="dropdown-link">Tư vấn</a></li>
                    </ul>
                </li>

                <li><a href="#contact" class="nav-link">Liên hệ</a></li>

                @guest
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Đăng nhập</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="#" class="nav-link">Chào, {{ Auth::user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link" style="border:none; background:none;">Thoát</button>
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>


    <script>
        const mobileMenu = document.getElementById('mobile-menu');
        const navMenu = document.querySelector('.nav-menu');

        mobileMenu.addEventListener('click', () => {
            navMenu.classList.toggle('active');
        });

        // Xử lý mở Dropdown trên Mobile
        if (window.innerWidth <= 768) {
            const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
            dropdownToggles.forEach(toggle => {
                toggle.addEventListener('click', function (e) {
                    e.preventDefault();
                    this.parentElement.classList.toggle('active');
                });
            });
        }

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                if (this.classList.contains('dropdown-toggle') && window.innerWidth <= 768) return;

                e.preventDefault();
                navMenu.classList.remove('active');

                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);

                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 70,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>

</html>