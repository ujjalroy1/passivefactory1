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
        if (!Schema::hasTable('wallets')) {
            Schema::create('wallets', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->string('account_id');
                $table->decimal('main_balance', 15, 2);
                $table->decimal('bonus', 15, 2);
                $table->decimal('refer', 15, 2);
                $table->decimal('gift', 15, 2);
                $table->decimal('cash_back', 15, 2);
                $table->timestamps();
                // $table->foreign('account_id')->references('account_id')->on('users')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallets');
    }
};
