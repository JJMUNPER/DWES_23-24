<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            //name varchar(35)
            $table->string('nombre', 35);//Si no se especifica el tamaño maximo es 255
            $table->string('apellidos', 45);
            $table->date('fecha_nacimiento');
            $table->char('telefono', 13)->nullable(false);
            $table->string('poblacion', 20);
            $table->char('dni', 9)->unique()->nullable(false);//Lo de unique es para que no se repita.
            $table->string( 'email', 40 )->unique();
            $table->unsignedBigInteger('curso_id');
            $table->timestamps();

            //restricciones
            $table->foreign('curso_id')
                ->references('id')->on('cursos')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
