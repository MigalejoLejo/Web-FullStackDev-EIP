<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {

        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('list_id');
            $table->unsignedBigInteger('asignee_id')->nullable();
            $table->string('title');
            $table->string('description')->nullable();
            $table->dateTime('due_date')->nullable();
            $table->dateTime('reminder_date')->nullable();
            $table->boolean('checked')->default(false);

            $table->foreign('list_id')
                ->references('id')
                ->on('tasklists');

            $table->foreign('asignee_id')
                ->references('id')
                ->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('tasks');
    }
};
