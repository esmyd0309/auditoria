<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreguntsRespuestsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'pregunts_respuests';

    /**
     * Run the migrations.
     * @table pregunts_respuests
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
            $table->integer('respuestas_id')->unsigned();
            $table->integer('evaluacions_id')->unsigned();
            $table->decimal('calificacion')->nullable();
            $table->date('fecha')->nullable();

            $table->foreign('preguntas_id')->references('id')->on('preguntas')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('respuestas_id')->references('id')->on('respuestas')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('evaluacions_id')->references('id')->on('evaluacions')
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
