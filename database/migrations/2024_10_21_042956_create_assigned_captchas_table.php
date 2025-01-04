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
        Schema::create('assigned_captchas', function (Blueprint $table) {
            $table->id();
        
        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('bought_package_id');
        
      
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('bought_package_id')->references('id')->on('bought_packages')->onDelete('cascade');

        $table->string('type');
        $table->decimal('price', 8, 2);
        $table->integer('used')->default(0);

       
        $table->timestamp('start_at')->nullable();
        $table->timestamp('expired_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assigned_captchas');
    }
};
