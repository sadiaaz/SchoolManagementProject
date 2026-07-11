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
        Schema::create('school_settings', function (Blueprint $table) {
            $table->id();
          // School Branding & Identity
            $table->string('school_name');
            $table->string('school_code')->nullable();
            $table->string('school_logo')->nullable();
            $table->string('school_favicon')->nullable();

            // Contact Info
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();

            // Physical Address
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('country')->nullable();
            $table->string('postal_code')->nullable();

            // Localization & System Display
            $table->string('timezone')->default('Asia/Karachi'); // Default to your local timezone
            $table->string('language')->default('en');
            $table->string('currency', 10)->default('PKR');     // Default local currency
            $table->string('date_format')->default('d-m-Y');
            $table->string('time_format')->default('h:i A');    // 12-hour format with AM/PM

            // Simple UI Preferences
            $table->boolean('dark_mode')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_settings');
    }
};
