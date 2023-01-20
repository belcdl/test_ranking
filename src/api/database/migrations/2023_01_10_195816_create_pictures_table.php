<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pictures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url', 150);
            $table->string('quality', 3);
        });


        DB::table('pictures')->insert([
            ['id' => 1, 'url' => 'https://www.idealista.com/pictures/1', 'quality' => 'SD'],
            ['id' => 2, 'url' => 'https://www.idealista.com/pictures/2', 'quality' => 'HD'],
            ['id' => 3, 'url' => 'https://www.idealista.com/pictures/3', 'quality' => 'SD'],
            ['id' => 4, 'url' => 'https://www.idealista.com/pictures/4', 'quality' => 'HD'],
            ['id' => 5, 'url' => 'https://www.idealista.com/pictures/5', 'quality' => 'SD'],
            ['id' => 6, 'url' => 'https://www.idealista.com/pictures/6', 'quality' => 'SD'],
            ['id' => 7, 'url' => 'https://www.idealista.com/pictures/7', 'quality' => 'SD'],
            ['id' => 8, 'url' => 'https://www.idealista.com/pictures/8', 'quality' => 'HD'],
            
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pictures', function (Blueprint $table) {
            Schema::dropIfExists('pictures');
        });
    }
};
