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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->onDelete("cascade");
            $table->foreignId("technician_id")->constrained("staff")->onDelete("cascade");
            $table->string("service_code")->unique();
            $table->string("product_name");
            $table->string("brand");
            $table->string("type");
            $table->string("serial_no");
            $table->string("MAC");
            $table->string("color");
            $table->string("problem");
            $table->string("remark");
            $table->string("status");
            $table->datetime('last_update')->nullable();   
            $table->datetime('delivered_by')->nullable();   
            $table->datetime("estimate_delivery");
            $table->datetime('date_of_delivery')->nullable();   
            $table->datetime("date_of_creation");
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
