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
        Schema::create('bikes', function (Blueprint $table) {
            $table->id();
            $table->string("type_bike");
            $table->string("image_bike");
            $table->string("name_bike");
            $table->string("color_bike");
   $table->integer("price");
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
        Schema::dropIfExists('bikes');
    }
};
