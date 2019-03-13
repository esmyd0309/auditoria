<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluacionsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'evaluacions';

    /**
     * Run the migrations.
     * @table evaluacions
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->integer('gestions_id')->unsigned();
            $table->integer('plantillas_id')->unsigned();
            $table->integer('tarea_id')->unsigned();
            $table->time('hora')->nullable();
            $table->dateTime('fecha')->nullable();
            $table->string('grabacion', 45)->nullable();
            $table->boolean('completada', 45)->nullable();
            $table->integer('cantidad_evaluar')->nullable();
            $table->decimal('calificacion_id')->nullable();
            $table->boolean('status')->nullable();
            $table->boolean('evaluado')->nullable();
            
            $table->foreign('users_id')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('tarea_id')->references('id')->on('tareas')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('gestions_id')->references('id')->on('gestions')
            ->onUpdate('cascade')->onDelete('cascade');

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
