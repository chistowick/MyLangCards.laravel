<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('original', 30);
            $table->string('originalComment', 80)->nullable()->default(NULL);
            $table->string('translation', 30);
            $table->string('translationComment', 80)->nullable()->default(Null);
            $table->tinyInteger('stack');
            $table->string('login', 20)->default('chistowick'); // TODO убрать логин по умолчанию
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
        Schema::dropIfExists('cards');
    }
}
