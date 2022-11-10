<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defi', function (Blueprint $table) {
            $table->id();
            $table->string('mining_group')->unique();
            $table->string('mining_group_url');
            $table->string('coin_token');
            $table->string('fees');
            $table->string('ages');
            $table->string('daily');
            $table->string('tvl');
            $table->string('tvl_24h');
            $table->string('tvl_7d');
            $table->string('your_balance');
            $table->string('est_24h');
            $table->string('last_action');
            $table->timestamp('failed_at')->useCurrent();
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
        Schema::dropIfExists('defi');
    }
}
