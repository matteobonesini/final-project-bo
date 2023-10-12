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
        Schema::create('developer_vote', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("developer_id");
            $table->foreign('developer_id')
                ->references('id')
                ->on('developers')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger("vote_id");
            $table->foreign('vote_id')
                ->references('id')
                ->on('votes')
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
        Schema::dropIfExists('developer_vote');
    }
};
