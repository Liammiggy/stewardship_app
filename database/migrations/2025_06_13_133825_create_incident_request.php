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
        Schema::create('incident_request', function (Blueprint $table) {
                $table->id();
                $table->foreignId('member_id')->constrained('members');
                $table->string('incident_title');
                $table->string('incident_type');
                $table->string('representative')->nullable();
                $table->date('daterequested');
                $table->string('status');
                $table->string('representative_type');
                $table->string('representative_name');
                $table->text('reason')->nullable();
                $table->timestamps();
             });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incident_request');
    }
};
