<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tạo bảng tin
     */
    public function up(): void
    {
        Schema::create('tin', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idLT'); // ID loại tin
            $table->string('tieuDe', 200);
            $table->text('tomTat')->nullable();
            $table->longText('noiDung')->nullable();
            $table->string('urlHinh', 255)->nullable();
            $table->integer('xem')->default(0);
            $table->boolean('noiBat')->default(0);
            $table->timestamps();
            
            // Foreign key
            $table->foreign('idLT')->references('id')->on('loaitin')->onDelete('cascade');
        });
    }

    /**
     * Xóa bảng tin
     */
    public function down(): void
    {
        Schema::dropIfExists('tin');
    }
};
