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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('typology', 50);
            $table->string('description', 255);
            $table->json('pictures');
            $table->integer('house_size');
            $table->integer('garden_size')->nullable();
            $table->integer('score')->nullable();
            $table->date('irrelevant_since')->nullable();
            $table->date('updated_at')->nullable();
        });
        DB::table('ads')->insert([
            ['id' => 1, 'typology' => 'CHALET', 'description' => 'Este piso es una ganga, compra, compra, COMPRA!!!!!', 'pictures' => '[]','house_size' => 300, 'garden_size' => null, 'score' => null, 'irrelevant_since' => null],
            ['id' => 2, 'typology' => 'FLAT', 'description' => 'Nuevo ático céntrico recién reformado. No deje pasar la oportunidad y adquiera este ático de lujo', 'pictures' => '[4]','house_size' => 300, 'garden_size' => null, 'score' => null, 'irrelevant_since' => null],
            ['id' => 3, 'typology' => 'CHALET', 'description' => '', 'pictures' => '[2]','house_size' => 300, 'garden_size' => null, 'score' => null, 'irrelevant_since' => null],
            ['id' => 4, 'typology' => 'FLAT', 'description' => 'Ático céntrico muy luminoso y recién reformado, parece nuevo', 'pictures' => '[5]','house_size' => 300, 'garden_size' => null, 'score' => null, 'irrelevant_since' => null],
            ['id' => 5, 'typology' => 'FLAT', 'description' => 'Pisazo,', 'pictures' => '[3,8]','house_size' => 300, 'garden_size' => null, 'score' => null, 'irrelevant_since' => null],
            ['id' => 6, 'typology' => 'GARAGE', 'description' => '', 'pictures' => '[6]','house_size' => 300, 'garden_size' => null, 'score' => null, 'irrelevant_since' => null],
            ['id' => 7, 'typology' => 'GARAGE', 'description' => 'Garaje en el centro de Albacete', 'pictures' => '[]','house_size' => 300, 'garden_size' => null, 'score' => null, 'irrelevant_since' => null],
            ['id' => 8, 'typology' => 'CHALET', 'description' => 'Maravilloso chalet situado en lAs afueras de un pequeño pueblo rural. El entorno es espectacular, las vistas magníficas. ¡Cómprelo ahora!', 'pictures' => '[1,7]','house_size' => 300, 'garden_size' => null, 'score' => null, 'irrelevant_since' => null],
            
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
};
