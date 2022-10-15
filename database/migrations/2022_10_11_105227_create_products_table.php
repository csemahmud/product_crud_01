<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Description of CreateProductsTable
 *
 * @author Mahmudul Hasan Khan CSE
 */

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id')->autoIncrement();
            $table->string('product_name', 100)->unique();
            $table->string('upload_path', 200)->nullable();
            $table->string('product_image', 150)->nullable();
            $table->text('product_description')->nullable();
            $table->integer('product_quantity');
            $table->double('product_price');
            $table->tinyInteger('pr_publication_status');
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
