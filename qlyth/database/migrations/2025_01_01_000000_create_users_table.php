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
        // Nếu bảng 'users' chưa tồn tại, tạo bảng mới
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->string('pass_status')->nullable();
                $table->string('student_status')->nullable()->default('0'); // Cột student_status mặc định là '0'
                $table->rememberToken();
                $table->timestamps();
            });
        } else {
            // Nếu bảng 'users' đã tồn tại, kiểm tra và thêm cột còn thiếu
            Schema::table('users', function (Blueprint $table) {
                if (!Schema::hasColumn('users', 'pass_status')) {
                    $table->string('pass_status')->nullable();
                }

                if (!Schema::hasColumn('users', 'student_status')) {
                    $table->string('student_status')->nullable()->default('0');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Xóa cột 'pass_status' và 'student_status' nếu tồn tại, không xóa toàn bộ bảng
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'pass_status')) {
                $table->dropColumn('pass_status');
            }

            if (Schema::hasColumn('users', 'student_status')) {
                $table->dropColumn('student_status');
            }
        });

        
    }
};
