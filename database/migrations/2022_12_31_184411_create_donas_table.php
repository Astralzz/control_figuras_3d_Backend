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
        Schema::create('donas', function (Blueprint $table) {
            $table->id();
            $table->string('usuario'); //Nombre a quien pertenece la dona
            $table->foreign('usuario')->references('nombre')->on('usuarios'); //llave foránea
            $table->boolean('aleatorio')->default(false);
            $table->enum('rotacion', ['NINGUNA', 'IZQUIERDA', 'DERECHA', 'ARRIBA', 'ABAJO'])->default('NINGUNA');
            $table->enum('movimiento', ['NINGUNO', 'IZQUIERDA', 'DERECHA', 'ARRIBA', 'ABAJO'])->default('NINGUNO');
            $table->string('color_dona', 6)->default('FF0000');
            $table->string('color_fondo', 6)->default('000000');
            $table->decimal('opacidad', 3, 1)->default(1);
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
        Schema::dropIfExists('donas');
    }
};
