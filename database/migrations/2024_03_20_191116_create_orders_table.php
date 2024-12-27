<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('name',100);
            $table->string('surename',100);
            $table->string('adress',100);
            $table->string('number',11);
            $table->string('email',100)->nullable();
            $table->text('note')->nullable();
            $table->string('status',30)->default('Не выполнен');
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
