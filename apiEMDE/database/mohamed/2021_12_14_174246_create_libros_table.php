<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //   'libro_id','nombre_libro','','descripcion','categoriaid','editorid','precio','entrega','imagen'

    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('nombre_libro',100);
            $table->longText('descripcion')->nullable();
            $table->smallInteger('categoriaid') ->unsigned();
            $table->smallInteger('editorid') ;
            $table->double('precio', 5,2);
            $table->smallInteger('entrega');
            $table->string('imagen')->nullable();
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
        Schema::dropIfExists('libros');
    }
}
