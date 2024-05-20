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
        Schema::create('task_status', function (Blueprint $table) {
            $table->id();
            $table->string("status");
            $table->integer("is_published")->default(0);
            $table->timestamps();
            $table->softDeletes();
            // 1 = to-do/ 2 = in-progress/ 3 = done
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_status');
    }
};
