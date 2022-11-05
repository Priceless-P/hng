<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computes', function (Blueprint $table) {
            $table->id();
            $table->string("slackUsername")->default('Priceless-Prisca');
            $table->integer("result");
            $table->enum("operation_type", ["addition", "subtraction", "multiplication"]);
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
        Schema::dropIfExists('computes');
    }
};
