<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('date');
        });

        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('categoryID');
            $table->double('price');
            $table->text('image');
            $table->text('detail');
        });

        Schema::create('stock', function (Blueprint $table) {
            $table->id();
            $table->integer('productID');
            $table->integer('quantity');
        });

        Schema::create('purchase', function (Blueprint $table) {
            $table->id();
            $table->string('date');
        });

        Schema::create('sale', function (Blueprint $table) {
            $table->id();
            $table->string('date');
        });

        Schema::create('purchaseDetail', function (Blueprint $table) {
            $table->id();
            $table->integer('purchaseID');
            $table->integer('admin');
            $table->integer('productID');
            $table->integer('sellerID');
            $table->integer('quantity');
            $table->double('price');
        });

        Schema::create('saleDetail', function (Blueprint $table) {
            $table->id();
            $table->integer('saleID');
            $table->integer('admin');
            $table->integer('productID');
            $table->integer('customerID');
            $table->integer('quantity');
            $table->double('price');
        });

        Schema::create('seller', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
           
        });

        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};
