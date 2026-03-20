<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tạo bảng loaitin
     */
    public function up(): void
    {
        Schema::create('loaitin', function (Blueprint $table) {
            $table->id();
            $table->string('ten', 100);
            $table->text('moTa')->nullable();
            $table->integer('thuTu')->default(0);
            $table->boolean('AnHien')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Xóa bảng loaitin
     */
    public function down(): void
    {
        Schema::dropIfExists('loaitin');
    }
};
