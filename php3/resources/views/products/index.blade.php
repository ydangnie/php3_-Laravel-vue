<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sản Phẩm - Dashboard</title>
    <style>
        /* 1. Reset & Cấu hình chung */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: #f0f2f5;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        /* 2. Container chính */
        .table-container {
            width: 100%;
            max-width: 1000px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .table-header h2 {
            font-size: 24px;
            color: #2d3436;
        }

        /* 3. Style cho Bảng */
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        thead tr {
            background-color: #4a90e2;
            color: #ffffff;
        }

        th,
        td {
            padding: 15px 20px;
            border-bottom: 1px solid #edf2f7;
        }

        th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 0.5px;
        }

        /* Hiệu ứng dòng */
        tbody tr:hover {
            background-color: #f8fbff;
            transition: background 0.2s ease;
        }

        /* Thông tin sản phẩm */
        .product-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .product-info img {
            width: 45px;
            height: 45px;
            border-radius: 8px;
            object-fit: cover;
            border: 1px solid #ddd;
        }

        .product-name {
            font-weight: 600;
            color: #2d3436;
        }

        /* Trạng thái */
        .status {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .in-stock {
            background-color: #d1fae5;
            color: #065f46;
        }

        .out-stock {
            background-color: #fee2e2;
            color: #991b1b;
        }

        /* Nút bấm */
        .actions {
            display: flex;
            gap: 8px;
        }

        .btn {
            padding: 7px 14px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 500;
            transition: transform 0.1s, opacity 0.2s;
        }

        .btn-edit {
            background-color: #3b82f6;
            color: white;
        }

        .btn-delete {
            background-color: #ef4444;
            color: white;
        }

        .btn:active {
            transform: scale(0.95);
        }

        .btn:hover {
            opacity: 0.9;
        }

        /* Responsive cho di động */
        @media (max-width: 768px) {
            .table-container {
                padding: 15px;
                overflow-x: auto;
            }

            th,
            td {
                padding: 10px;
                font-size: 13px;
            }
        }
    </style>
</head>

<body>

    <div class="table-container">
        <div class="table-header">
            <h2>Danh sách sản phẩm</h2>
            <a href="{{ route('products.create') }}">
                <button class="btn btn-edit" style="background-color: #10b981;">+ Thêm mới</button>
            </a>
        </div>
{{ $message = Session::get('message') }}

        <Form method="GET">
           <input type="text" name="search" value="{{ request('search') }}" placeholder="Tìm kiếm sản phẩm...">
            <input type="submit" placeholder="Tìm">
        </Form>


        <table>
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá bán</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @if($products->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center">Không có sản phẩm nào.</td>
                    </tr>
                @endif
                @foreach ($products as $product)
                <tr>
                    <td>
                        <div class="product-info">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Laptop" width="100px">
                            <span class="product-name">{{ $product->name }}</span>
                        </div>
                    </td>
                    <td>{{ $product->quantity }}</td>

                    <td>
                        @if($product->price > 350)

                            <span style="color: red">{{ number_format($product->price) }}₫</span>
                        @else
                            <span style="color: green">{{ number_format($product->price) }}₫</span>

                        @endif

                    </td>
                    <td><span class="status in-stock">{{ $product->status }}</span></td>

                    <td class="actions">
                        <form action="{{ route('products.edit', $product->id) }}" method="GET"
                            style="display: inline-block;">
                            @csrf
                            @method('UPDATE')
                            <button type="submit" class="btn btn-create">Sửa</button>
                        </form>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Xóa</button>
                        </form>
                       
                    </td>
                </tr>
               
            @endforeach


            </tbody>
        </table>{{ $products->links() }}
    </div>

</body>

</html>