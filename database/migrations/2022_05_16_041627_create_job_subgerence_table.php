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
        Schema::create('job_sales_gerence', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')
                ->constrained('jobs')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('sales_gerence_id')
                ->constrained('sales_gerences')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('job_sales_gerence');
    }
};
