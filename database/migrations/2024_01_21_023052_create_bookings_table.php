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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('given_name')->nullable();
            $table->string('family_name')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('email_address')->nullable();
            $table->string('home_office')->nullable();
            $table->string('floor')->nullable();
            $table->string('flat')->nullable();
            $table->string('tower')->nullable();
            $table->string('street')->nullable();
            $table->string('road')->nullable();
            $table->string('building')->nullable();
            $table->string('village')->nullable();
            $table->string('district')->nullable();
            $table->string('social')->nullable();
            $table->string('first_preference')->nullable();
            $table->string('second')->nullable();
            $table->string('split_type_AC')->nullable();
            $table->string('window_AC')->nullable();
            $table->string('duct_AC')->nullable();
            $table->string('cassette_AC')->nullable();
            $table->string('behind_grills')->nullable();
            $table->string('meters_above')->nullable();
            $table->string('any_stairs')->nullable();
            $table->string('any_water')->nullable();
            $table->string('any_AC')->nullable();
            $table->string('visitor_car')->nullable();
            $table->string('exterior_cleaning')->nullable();
            $table->string('hourly_rate')->nullable();
            $table->string('hear_about')->nullable();
            $table->string('discount_code')->nullable();
            $table->string('repeat_customer')->nullable();
            $table->string('other_notes')->nullable();
            $table->string('cleaning_product')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
