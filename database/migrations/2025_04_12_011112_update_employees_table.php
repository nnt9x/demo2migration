<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            // Bo sung rang buoc
            $table->unsignedBigInteger('office_id')->change(); # Cập nhật office_id bên bảng employees thành bigint unsign
            $table->foreign('office_id')->references('id')
                ->on('offices');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Xoa rang buoc
        $table->foreignId('office_id')->constrained();
    }
};
