<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantillasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'plantillas';

    /**
     * Run the migrations.
     * @table plantillas
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
        
            $table->string('nombre')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('gestion')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->string('ciudad', 45)->nullable();
            $table->decimal('maxima_calificacion')->nullable();

      
            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
