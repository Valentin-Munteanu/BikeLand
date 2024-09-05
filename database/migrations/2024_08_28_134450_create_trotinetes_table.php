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
        Schema::create('trotinetes', function (Blueprint $table) {
            $table->id();
            $table->string("image");
            $table->string("speed_trt");
            $table->string("name_trt");
            $table->string("color_trt");
            $table->integer("price_trt");
            $table->text("description");
            $table->softDeletes();
            $table->unsignedBigInteger("admin_id");
            $table->foreign("admin_id")->references("id")->on("admins")->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trotinetes');
    }
};
