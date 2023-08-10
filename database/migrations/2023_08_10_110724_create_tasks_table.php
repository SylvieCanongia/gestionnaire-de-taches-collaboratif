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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id('task_id');
            $table->string('task_title');
            $table->text('task_description')->nullable();
            $table->dateTime('due_date');
            $table->unsignedBigInteger('priority_id')->nullable();
            $table->unsignedBigInteger('list_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('priority_id')->references('priority_id')->on('priorities');
            $table->foreign('list_id')->references('list_id')->on('task_lists');
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
