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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("quantity")->default(1);
            $table->integer("total_price");
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("bikes_id")->nullable();
            $table->unsignedBigInteger("accesorii_id")->nullable();
            $table->unsignedBigInteger("trotinete_id")->nullable();

            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("bikes_id")->references("id")->on("bikes")->onDelete("cascade");
            $table->foreign("accesorii_id")->references("id")->on("accesoriis")->onDelete("cascade");
            $table->foreign("trotinete_id")->references("id")->on("trotinetes")->onDelete("cascade");



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
