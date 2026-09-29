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
    Schema::create('studios', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->decimal('price_per_hour', 10, 2);
        $table->text('description');
        $table->timestamps();
        });

    Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        $table->string('customer_name');
        $table->foreignId('studio_id')->constrained()->onDelete('cascade');
        $table->date('booking_date');
        $table->string('time_slot');
        $table->enum('status', ['Pending', 'Confirmed', 'Cancelled'])->default('Pending');
        $table->string('payment_proof')->nullable(); // Status QR Code / Upload bukti
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studios');
    }
};
