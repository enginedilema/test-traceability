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
        Schema::create('sample_receptions', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name')->nullable();
            $table->string('gender')->nullable();
            $table->integer('age')->nullable();
            $table->string('identification_number')->nullable();
            $table->text('clinical_information')->nullable();
            $table->foreignId('origin_lab_id')->constrained('origin_labs');
            $table->string('origin_lab_other')->nullable()->default(null);
            $table->string('requesting_person')->nullable();
            $table->timestamp('registration_date');
            $table->foreignId('exfoliative_sample_type_id')->nullable()->constrained('sample_type_exfoliatives')->default(null);
            $table->foreignId('paaf_sample_type_id')->nullable()->constrained('sample_type_paafs')->default(null);
            $table->string('sample_type_other')->nullable()->default(null);
            $table->enum('lateralitat', ['right', 'left'])->nullable()->default(null);
            $table->unsignedBigInteger('technical_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sample_receptions');
    }
};
