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
            $table->string('task_title', 255);
            $table->string('task_description', 500)->nullable();
            $table->dateTime('due_date')->nullable();

            $table->foreignId('priority_id')->nullable()->constrained('priorities', 'priority_id');
            $table->foreignId('list_id')->constrained('task_lists', 'list_id');
            $table->foreignId('user_id')->constrained('users');

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
