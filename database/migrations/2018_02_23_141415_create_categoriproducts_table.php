<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoriproducts', function (Blueprint $table) {
            $table->increments('id');

				$table->integer('categori_id')->unsigned();
				$table->foreign('categori_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
			
		
				$table->integer('tovar_id')->unsigned();
				$table->foreign('tovar_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoriproducts');
    }
}
