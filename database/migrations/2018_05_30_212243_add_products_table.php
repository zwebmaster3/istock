<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('pd_id');
            $table->string('pd_name', 50);
            $table->string('pd_description');
            $table->decimal('pd_price', 8, 2);
            $table->integer('pd_stock');
            $table->enum('status', ['Exitente', 'Sin Existencias', 'Alerta', 'Eliminado']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
