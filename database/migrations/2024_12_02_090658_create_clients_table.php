<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('gst')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->integer('licenses')->default(0); 
            $table->string('expertise')->nullable(); 
            $table->date('validity')->nullable();
            $table->enum('payment_mode', ['cash', 'card'])->nullable();
            $table->text('payment_details')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
