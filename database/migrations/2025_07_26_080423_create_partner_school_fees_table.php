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
        Schema::create('partner_school_fees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('partner_school_id')->nullable();
            $table->string('age')->nullable();
            $table->decimal('per_month_fees', 10, 2)->default(0.00);
            $table->decimal('annual_fees', 10, 2)->default(0.00);
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partner_school_fees');
    }
};
