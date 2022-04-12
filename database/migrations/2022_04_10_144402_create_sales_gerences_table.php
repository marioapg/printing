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
        Schema::create('sales_gerences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gerence_id')
                ->constrained('gerences')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('name');
            $table->unique(['gerence_id', 'name']);
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
        Schema::dropIfExists('sales_gerences');
    }
};
