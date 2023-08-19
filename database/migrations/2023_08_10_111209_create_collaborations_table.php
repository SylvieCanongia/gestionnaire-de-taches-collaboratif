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
        Schema::create('collaborations', function (Blueprint $table) {
            $table->id('collaboration_id');
            $table->string('invitation_status');
            $table->timestamp('invitation_date')->nullable();
            $table->timestamp('acceptance_date')->nullable();

            $table->foreignId('task_list_id')->constrained('task_lists', 'list_id');
            $table->foreignId('invited_user_id')->constrained('users');
            $table->foreignId('inviting_user_id')->constrained('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collaborations');
    }
};
