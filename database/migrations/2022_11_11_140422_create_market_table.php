<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('amount')->default(1);

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');

            $table->string('image')->nullable();
            $table->string('name');
            $table->text('description');
            $table->float('price');
            $table->boolean('active')->default(true);

            $table->boolean('published')->default(true);
            $table->timestamp('published_at')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('market');
    }
};
