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
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('appliance_type');
            $table->string('brand');
            $table->text('problem_details');
            $table->string('collection_address');
            $table->string('service_type');
            $table->string('preferred_contact_method');
            $table->string('damaged_appliance_image')->nullable();
            $table->timestamp('application_date')->useCurrent();
            $table->string('state')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_requests');
    }
};
