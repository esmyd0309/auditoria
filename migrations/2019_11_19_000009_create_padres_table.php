<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePadresTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'padres';

    /**
     * Run the migrations.
     * @table padres
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            
            $table->string('Ccedula')->nullable();
            $table->string('nombres')->nullable();
            $table->string('cedula_conyugue')->nullable();
            $table->string('nombre_conyugue')->nullable();
            $table->string('cedula_padre')->nullable();
            $table->string('nombre_padre')->nullable();
            $table->string('cedula_madre')->nullable();
            $table->string('nombre_madre')->nullable();
       
           
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
