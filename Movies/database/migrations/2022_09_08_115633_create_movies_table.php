<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger("status");
            $table->tinyText("name");
            $table->decimal("rating", 10, 2);
            $table->text("description");
            $table->string("image", 256);
            $table->dateTime("delete_at")->nullable()->default(null);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('movies');
    }
};
