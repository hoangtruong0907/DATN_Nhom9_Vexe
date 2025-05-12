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
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->string('order_code');
            $table->string('trip_code');
            $table->string('user_id')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('customer_phone');
            $table->string('customer_email')->nullable();
            $table->string('seats');
            $table->string('code');
            $table->string('booking_code');
            $table->string('tickets');
            $table->string('ticket_code')->nullable(); // sau khi thanh toán sẽ trả về 
            $table->string('vxr_transaction_id')->nullable(); // sau khi thanh toán sẽ trả về
            $table->string('price');
            $table->integer('pickup_id')->nullable();
            $table->string('drop_off_info')->nullable();
            $table->integer('drop_off_point_id');
            $table->integer('status')->default(config('apps.common.status_booking.reserve'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
