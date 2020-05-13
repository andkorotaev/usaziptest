<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zip', function (Blueprint $table) {
            $table->id();
            $table->string('zip')->unique();
            $table->double('lat', 8, 5);
            $table->double('lng', 8, 5);
            $table->string('city');
            $table->string('state_id', 2);
            $table->string('state_name');
            $table->boolean('zcta');
            $table->double('parent_zcta')->nullable();
            $table->integer('population')->unsigned();
            $table->double('density', 5, 1);
            $table->integer('county_fips')->unsigned();
            $table->string('county_name');
            $table->string('county_weights');
            $table->string('county_names_all');
            $table->string('county_fips_all');
            $table->boolean('imprecise');
            $table->boolean('military');
            $table->string('timezone');
            $table->timestamps();

            $table->index('zip');
            $table->index('city');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zip');
    }
}
