<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sản Phẩm - Dashboard</title>
    <!-- Khuyên dùng font Inter cho phong cách tối giản -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        /* 1. CSS Variables & Reset */
        :root {
            --black: #0a0a0a;
            --white: #ffffff;
            --gray-light: #f9f9f9;
            --gray-border: #eaeaea;
            --gray-text: #666666;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--gray-light);
            color: var(--black);
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            padding: 40px 20px;
        }

        a { text-decoration: none; }

        /* 2. Container chính */
        .table-container {
            width: 100%;
            max-width: 1100px;
            background-color: var(--white);
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.04);
            border: 1px solid var(--gray-border);
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInContainer 0.6s forwards;
        }

        /* 3. Header & Filter */
        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--gray-border);
        }

        .table-header h2 {
            font-size: 22px;
            font-weight: 600;
            letter-spacing: -0.5px;
        }

        .action-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            gap: 15px;
        }

        .search-form {
            display: flex;
            gap: 10px;
            flex: 1;
            max-width: 400px;
        }

        .search-form input[type="text"] {
            width: 100%;
            padding: 10px 16px;
            border: 1px solid var(--gray-border);
            border-radius: 8px;
            font-size: 14px;
            outline: none;
            transition: var(--transition);
        }

        .search-form input[type="text"]:focus {
            border-color: var(--black);
            box-shadow: 0 0 0 3px rgba(0,0,0,0.05);
        }

        /* 4. Buttons */
        .btn {
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 500;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-dark {
            background-color: var(--black);
            color: var(--white);
            border: 1px solid var(--black);
        }

        .btn-dark:hover {
            background-color: var(--white);
            color: var(--black);
        }

        .btn-outline {
            background-color: transparent;
            color: var(--black);
            border: 1px solid var(--gray-border);
        }

        .btn-outline:hover {
            border-color: var(--black);
            background-color: var(--gray-light);
        }

        /* 5. Style Bảng */
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            text-align: left;
        }

        thead th {
            padding: 16px 20px;
            border-bottom: 2px solid var(--black);
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--gray-text);
        }

        tbody td {
            padding: 20px;
            border-bottom: 1px solid var(--gray-border);
            vertical-align: middle;
        }

        tbody tr {
            transition: var(--transition);
        }

        tbody tr:hover {
            background-color: var(--gray-light);
        }

        /* 6. Thành phần trong bảng */
        .product-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .product-info img {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            object-fit: cover;
            border: 1px solid var(--gray-border);
            background: var(--white);
            transition: var(--transition);
        }

        tbody tr:hover .product-info img {
            transform: scale(1.05);
        }

        .product-name {
            font-weight: 500;
            font-size: 15px;
        }

        /* Status Badges B&W */
        .status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            border: 1px solid var(--black);
        }

        .status.in-stock {
            background-color: transparent;
            color: var(--black);
        }

        .status.out-stock {
            background-color: var(--gray-text);
            color: var(--white);
            border-color: var(--gray-text);
        }

        .price {
            font-weight: 600;
        }
        
        /* Thay vì Đỏ/Xanh, ta dùng đậm nhạt để thể hiện ý đồ */
        .price.high { color: var(--black); }
        .price.normal { color: var(--gray-text); font-weight: 400; }

        .actions {
            display: flex;
            gap: 10px;
        }

        /* Alert Message */
        .alert {
            padding: 12px 20px;
            background: var(--black);
            color: var(--white);
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            display: inline-block;
            animation: fadeInContainer 0.4s forwards;
        }

        /* Pagination Wrapper */
        .pagination-wrapper {
            margin-top: 30px;
            display: flex;
            justify-content: flex-end;
        }

        /* 7. Animations */
        @keyframes fadeInContainer {
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-row {
            opacity: 0;
            transform: translateX(-10px);
            animation: fadeRowIn 0.4s forwards;
        }

        @keyframes fadeRowIn {
            to { opacity: 1; transform: translateX(0); }
        }

        /* Trạng thái xóa dòng */
        .row-deleting {
            opacity: 0 !important;
            transform: translateX(30px) !important;
            pointer-events: none;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .table-container { padding: 20px; }
            .action-bar { flex-direction: column; align-items: stretch; }
            .table-wrapper { overflow-x: auto; }
            .btn { width: 100%; }
        }
    </style>
</head>

<body>

    <div class="table-container">
        
        @if(Session('thongbao'))
            <div class="alert" style="background:#eaeaea , color(  green)">
                {{ Session('thongbao') }}
            </div>
        @endif

        <div class="table-header">
            <h2>Danh sách products</h2>
            <a href="{{ route('products.create') }}">
                <button class="btn btn-dark">+ Thêm mới</button>
            </a>
        </div>

        <div class="action-bar">
            <form method="GET" class="search-form">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Tìm kiếm sản phẩm...">
                <button type="submit" class="btn btn-outline">Tìm</button>
            </form>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @if($thuonghieu->isEmpty())
                        <tr>
                            <td colspan="5" style="text-align: center; color: var(--gray-text); padding: 40px;">
                                Không có sản phẩm nào.
                            </td>
                        </tr>
                    @endif
                    
                    @foreach ($thuonghieu as $th)
                    <tr class="product-row">
                       
                        <td>{{ $th->id }}</td>
                     
                        <td>
                         
                            <span class="status in-stock">{{ $th->name }}</span>
                        </td>
                    
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="pagination-wrapper">
            {{ $thuonghieu->links() }}
        </div>
    </div>

    <!-- JS Hiệu ứng -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // 1. Hiệu ứng xuất hiện tuần tự (Staggered fade-in) cho các hàng trong bảng
            const rows = document.querySelectorAll(".product-row");
            rows.forEach((row, index) => {
                row.classList.add("fade-row");
                // Tăng delay cho mỗi hàng để tạo hiệu ứng lướt xuống
                row.style.animationDelay = `${index * 0.1}s`;
            });

            // 2. Hiệu ứng JS khi bấm xóa
            const deleteForms = document.querySelectorAll(".delete-form");
            deleteForms.forEach(form => {
                form.addEventListener("submit", function(e) {
                    e.preventDefault(); // Ngừng submit ngay lập tức
                    
                    // Native confirm box
                    if (confirm("Hành động này không thể hoàn tác. Bạn có chắc chắn muốn xóa sản phẩm này?")) {
                        const tr = this.closest('tr');
                        // Thêm class tạo animation bay ra ngoài
                        tr.classList.add('row-deleting');
                        
                        // Đợi animation chạy xong (300ms) rồi mới submit form lên server
                        setTimeout(() => {
                            this.submit();
                        }, 300);
                    }
                });
            });
        });
    </script>
</body>
</html>