<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gajis', function (Blueprint $table) {
            $table->id();
            $table->decimal('nominal', 15, 2);
            $table->date('tanggal_gajian');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gajis');
    }
};