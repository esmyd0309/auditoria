<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGestionsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'gestions';

    /**
     * Run the migrations.
     * @table gestions
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');   
            $table->integer('estados_id')->unsigned();
            $table->integer('departamentos_id')->unsigned();
            $table->date('fecha')->nullable();
            $table->dateTime('hora')->nullable();
            $table->string('agente', 45)->nullable();
            $table->string('supervisor')->nullable();
            $table->string('producto')->nullable();
            $table->string('cedula', 45)->nullable();
            $table->string('nombres_cliente', 45)->nullable();
            $table->string('telefono', 45)->nullable();
            $table->string('deuda', 45)->nullable();
            $table->string('pagos', 45)->nullable();
            $table->string('resultado_gestion', 45)->nullable();
            $table->string('duracion_llamada', 45)->nullable();
            $table->boolean('status')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            
            $table->foreign('estados_id')->references('id')->on('estados')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('departamentos_id')->references('id')->on('departamentos')->onUpdate('cascade')->onDelete('cascade');
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
