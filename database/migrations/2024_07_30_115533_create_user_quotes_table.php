<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserQuotesTable extends Migration
{
    public function up()
    {
        Schema::create('user_quotes', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address');
            $table->json('quote_order'); // Храним порядок цитат в формате JSON
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_quotes');
    }
}
