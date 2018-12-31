<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTareasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'tareas';

    /**
     * Run the migrations.
     * @table tareas
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
            $table->integer('plantillas_id')->unsigned();
            $table->integer('departamentos_id')->unsigned();
            $table->integer('estados_id')->unsigned();
            $table->string('nombre')->nullable();
            $table->string('descripcion')->nullable();
            $table->integer('cantidad_registros')->nullable();
            $table->integer('registros_agentes')->nullable();
            $table->date('fecha')->nullable();


            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('departamentos_id')->references('id')->on('departamentos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('estados_id')->references('id')->on('estados')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('plantillas_id')->references('id')->on('plantillas')->onUpdate('cascade')->onDelete('cascade');
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
