<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
         Schema::create('products', function (Blueprint $table) {
          $table->id(); // ID tự tăng (Primary Key)
        $table->string('name'); // Tên sản phẩm
        $table->string('slug')->unique(); // Đường dẫn thân thiện
        $table->text('description')->nullable(); // Mô tả (có thể để trống)
        $table->decimal('price', 15, 2); // Giá tiền (ví dụ: 100.000,00)
        $table->integer('quantity')->default(0); // Số lượng kho
        $table->string('image')->nullable(); // Đường dẫn ảnh
        $table->boolean('status')->default(true); // Trạng thái ẩn/hiện
        $table->timestamps(); // Tự động tạo cột created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::dropIfExists(table: 'products');
    }
};
