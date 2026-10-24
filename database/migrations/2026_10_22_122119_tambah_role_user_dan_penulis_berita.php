<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
    Schema::table('users', function (Blueprint $table) {
        $table->string('role')->default('editor')->after('email');
    });
    Schema::table('beritas', function (Blueprint $table) {
        $table->foreignId('kategori_id')->after('judul')->constrained('kategoris');
        $table->foreignId('user_id')->after('kategori_id')->constrained('users');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
