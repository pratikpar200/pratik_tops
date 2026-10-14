<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
            $table->foreignId('mechanic_id')->nullable()->constrained('mechanics')->onDelete('set null');
            $table->string('vehicle_name');
            $table->string('vehicle_number')->nullable();
            $table->date('booking_date');
            $table->time('booking_time')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('booking_status')->default('Pending');
            $table->string('payment_status')->default('Pending');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
