<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm mới | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }
        .form-label {
            font-weight: 600;
            color: #495057;
        }
        .btn-primary {
            background-color: #4e73df;
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
        }
        .btn-primary:hover {
            background-color: #2e59d9;
        }
        .preview-image {
            max-width: 200px;
            margin-top: 10px;
            display: none;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0">Thêm sản phẩm mới</h2>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-sm">Quay lại danh sách</a>
                </div>

                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="name" class="form-label">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Ví dụ: Áo thun Polo cao cấp" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="slug" class="form-label">Đường dẫn (Slug)</label>
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="ao-thun-polo-cao-cap">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="price" class="form-label">Giá bán (VNĐ)</label>
                            <input type="number" class="form-control" id="price" name="price" value="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="quantity" class="form-label">Số lượng kho</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="1">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="status" class="form-label">Trạng thái</label>
                            <select class="form-select" id="status" name="status">
                                <option value="1" selected>Đang bán</option>
                                <option value="0">Tạm hết hàng / Ẩn</option>
                            </select>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="description" class="form-label">Mô tả sản phẩm</label>
                            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Viết vài dòng giới thiệu sản phẩm..."></textarea>
                        </div>

                        <div class="col-md-12 mb-4">
                            <label for="image" class="form-label">Hình ảnh sản phẩm</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="previewFile()">
                            <img src="" id="image-preview" class="preview-image" alt="Preview">
                        </div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">Lưu sản phẩm ngay</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // 1. Tự động tạo Slug khi gõ tên sản phẩm
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');

    nameInput.addEventListener('keyup', function() {
        let title = nameInput.value;
        let slug = title.toLowerCase();
        // Xóa dấu tiếng Việt
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        // Xóa ký tự đặc biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        // Đổi khoảng trắng thành gạch ngang
        slug = slug.replace(/ /gi, "-");
        // Đổi nhiều gạch ngang liên tiếp thành 1 gạch ngang
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        
        slugInput.value = slug;
    });

    function previewFile() {
        const preview = document.getElementById('image-preview');
        const file = document.querySelector('input[type=file]').files[0];
        const reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
            preview.style.display = 'block';
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
            preview.style.display = 'none';
        }
    }
</script>

</body>
</html>