<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNumberOccurrencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('number_occurrences', function (Blueprint $table) {
            $table->integer('id')->unique()->unsigned();
            $table->integer('occurrences');
        });

        foreach(range(1,100) as $number) {
            DB::table('number_occurrences')->insert([
                'id' => $number,
                'occurrences' => 0,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('number_occurrences');
    }
}
