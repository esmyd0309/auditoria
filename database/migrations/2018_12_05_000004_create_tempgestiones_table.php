<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempgestionesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'tempgestiones';

    /**
     * Run the migrations.
     * @table tempgestiones
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('gestions_id')->unsigned();
            $table->integer('tareas_id')->unsigned();
            $table->integer('plantillas_id')->unsigned();
            $table->integer('departamentos_id')->unsigned();
            $table->tinyInteger('status')->nullable();
        

            $table->foreign('gestions_id')->references('id')->on('gestions')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('departamentos_id')->references('id')->on('departamentos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tareas_id')->references('id')->on('tareas')
            ->onUpdate('cascade')->onDelete('cascade');
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
