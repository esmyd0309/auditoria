<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreguntasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'preguntas';

    /**
     * Run the migrations.
     * @table preguntas
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('plantillas_id')->unsigned();
       
            $table->string('pregunta')->nullable();
            $table->string('descripcion')->nullable();
            $table->decimal('peso')->nullable();
            $table->string('tipo')->nullable();
            $table->string('cantidad', 45)->nullable();
            $table->date('fecha')->nullable();
            $table->tinyInteger('status')->nullable();

            $table->foreign('plantillas_id')->references('id')->on('plantillas')
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
