<?php

use App\Enums\RegisterStatus;
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
        Schema::create('registers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->enum('status', array_column(RegisterStatus::cases(), 'name')); ///fazer os enums
            $table->bigInteger('cpf')->unique();;
            $table->bigInteger('number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registers');
    }
};
