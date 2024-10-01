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
            $table->foreignId("user_id")->nullable()->constrained()->onDelete("cascade");
            $table->foreignId("technician_id")->nullable()->constrained("staff")->onDelete("cascade");
            $table->string("service_code")->unique();
            $table->string("owner_name");
            $table->string("product_name");
            $table->string("email");
            $table->string("contact");
            $table->string("brand");
            $table->foreignId("type_id")->constrained();
            $table->string("serial_no")->nullable();
            $table->string("MAC")->nullable();
            $table->string("color");
            $table->string("problem");
            $table->string("remark")->nullable();
            $table->float("status")->default(0.0);
            $table->datetime('last_update')->nullable();   
            $table->string('delivered_by')->nullable();   
            $table->datetime("estimate_delivery")->nullable();
            $table->datetime('date_of_delivery')->nullable();   
            $table->timestamps();
            
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
