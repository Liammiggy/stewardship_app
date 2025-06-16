<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentContributionsTableV2 extends Migration

{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('incident_contributions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('incident_request_id');
            $table->unsignedBigInteger('member_id');
            $table->decimal('amount', 10, 2)->default(0);
            $table->enum('status', ['paid', 'unpaid'])->default('unpaid');
            $table->timestamps();

            $table->foreign('incident_request_id')
                  ->references('id')->on('incident_request')
                  ->onDelete('cascade');

            $table->foreign('member_id')
                  ->references('id')->on('members')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incident_contributions');
    }
}
