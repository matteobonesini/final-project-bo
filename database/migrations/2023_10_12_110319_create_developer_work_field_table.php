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


        Schema::create('developer_work_field', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("developer_id")->nullable();
            $table->foreign('developer_id')
                ->references('id')
                ->on('developers')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger("work_field_id")->nullable();
            $table->foreign('work_field_id')
                ->references('id')
                ->on('work_fields')
                ->onDelete('cascade')
                ->onUpdate('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('developer_work_field');
    }
};
