<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('file_id');
            $table->uuid('category_id');
            $table->string('name', 100);
            $table->string('corporate_name', 100);
            $table->string('document', 15)->unique();
            $table->string('email')->unique();
            $table->string('zip_code', 10);
            $table->string('street', 100);
            $table->string('complement', 100)->nullable();
            $table->string('neighborhood', 30);
            $table->string('city', 50);
            $table->string('state', 3);
            $table->double('latitude')->default(0);
            $table->double('longitude')->default(0);
            $table->integer('delivery_time')->nullable();
            $table->double('delivery_fee')->nullable();
            $table->boolean('status')->default(1);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
}
