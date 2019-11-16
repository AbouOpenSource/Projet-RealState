<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuartiersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'quartiers';

    /**
     * Run the migrations.
     * @table Quartiers
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
           // $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nom', 45);
            $table->string('longitude', 45)->nullable();
            $table->string('lagitude', 45)->nullable();
            $table->integer('ville_id');

          //  $table->index(["ville_id"], 'fk_Quartiers_Ville_idx');


            $table->foreign('ville_id')
                ->references('id')->on('villes')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
