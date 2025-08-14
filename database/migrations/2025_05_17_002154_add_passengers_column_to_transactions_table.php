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
        Schema::table('transactions', function (Blueprint $table) {
            // Tambahkan kolom passengers sebagai JSON
            $table->json('passengers')->nullable()->after('phone');
            
            // Pastikan kolom number_of_passengers ada dan memiliki default value
            if (!Schema::hasColumn('transactions', 'number_of_passengers')) {
                $table->integer('number_of_passengers')->default(1)->after('passengers');
            }
            
            // Pastikan kolom code tidak nullable dan unique
            $table->string('code')->nullable(false)->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            // Hapus kolom yang ditambahkan
            $table->dropColumn('passengers');
            
            // Kembalikan kolom code ke nullable (opsional)
            $table->string('code')->nullable()->change();
        });
    }
};