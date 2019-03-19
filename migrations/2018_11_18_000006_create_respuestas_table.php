<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespuestasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'respuestas';

    /**
     * Run the migrations.
     * @table respuestas
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('preguntas_id')->unsigned();
            $table->string('respuesta')->nullable();
            $table->string('comentario')->nullable();
            $table->decimal('valor_1', 45)->nullable();
            $table->date('fecha')->nullable();
            $table->tinyInteger('status')->nullable();

            $table->foreign('preguntas_id')->references('id')->on('preguntas')
            ->onUpdate('cascade')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
