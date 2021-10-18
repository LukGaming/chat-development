<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilFillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfil_fills', function (Blueprint $table) {
            $table->string('user_name_that_others_can_see');
            $table->string('profile_phrase');
            $table->string('image_perfil_path');
            $table->rememberToken();
            $table->timestamps();
            $table->foreignId('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perfil_fills');
    }
}
