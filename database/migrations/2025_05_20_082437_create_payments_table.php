<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->string('order_id')->nullable();
            $table->string('payment_session_id')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->decimal('amount', 10, 2);
            $table->string('currency')->default('INR');

            $table->string('status')->default('pending'); // pending, paid, failed
            $table->json('response')->nullable(); // store raw response if needed

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
