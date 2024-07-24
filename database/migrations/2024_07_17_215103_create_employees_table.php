<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('position_id')->constrained('positions');
            $table->foreignId('headmen_id')->nullable()->references('id')->on('employees');
            $table->date('date_of_employment');
            $table->string('email');
            $table->string('phone');
            $table->double('salary');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
