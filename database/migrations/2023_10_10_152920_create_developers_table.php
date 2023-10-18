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
        Schema::create('developers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->after('id')
                ->on('users')

                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedTinyInteger('experience_year')->nullable();
            $table->string('curriculum', 255)->nullable();
            $table->string('profile_picture', 255)->nullable();
            $table->text('profile_description');
            $table->string('address', 96)->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('developers');
    }
};
