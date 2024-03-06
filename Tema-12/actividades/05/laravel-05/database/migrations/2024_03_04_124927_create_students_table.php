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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            //name varchar(35)
            $table->string('name', 35);//Si no se especifica el tamaño maximo es 255
            $table->string('lastname', 45);
            $table->date('birth_date');
            $table->char('phone', 13)->nullable(false);
            $table->string('city', 40);
            $table->char('dni', 9)->unique()->nullable(false);//Lo de unique es para que no se repita.
            $table->string( 'email', 40 )->unique();
            $table->unsignedBigInteger('course_id');
            $table->timestamps();

            //restricciones
            $table->foreign('course_id')
                ->references('id')->on('courses')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
