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
            $table->unsignedBigInteger('task_list_id');
            $table->unsignedBigInteger('invited_user_id');
            $table->unsignedBigInteger('inviting_user_id');
            $table->string('invitation_status');
            $table->timestamp('invitation_date')->nullable();
            $table->timestamp('acceptance_date')->nullable();

            $table->foreign('task_list_id')->references('list_id')->on('task_lists');
            $table->foreign('invited_user_id')->references('id')->on('users');
            $table->foreign('inviting_user_id')->references('id')->on('users');
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
