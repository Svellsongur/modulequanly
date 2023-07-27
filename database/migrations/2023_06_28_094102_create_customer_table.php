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
        Schema::create('customer', function (Blueprint $table) {
            //id: Khóa chính, A_I
            $table->id();
            //$table->kiểu dữ liệu('tên cột', giới hạn)->ràng buộc
            $table->string('name')->nullable(); //nullable: ko đc bỏ trống 
            $table->string('address')->unique();
            $table->date('birthday')->nullable();
            $table->tinyInteger('gender')->default(1); //default: đặt giá trị mặc định 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
