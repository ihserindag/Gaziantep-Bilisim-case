<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prozes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('film_id')->nullable()->constrained()->onDelete('CASCADE');
            $table->unsignedBigInteger('category_id')->nullable()->constrained()->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prozes');
    }
}
