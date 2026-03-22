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
         Schema::create('danhmuc', function (Blueprint $table) {
 $table->id(); // ID tự tăng (Primary Key)
        $table->string('name'); // Tên sản phẩm
        





         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::dropIfExists(table: 'danhmuc');
    }
};
