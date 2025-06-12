<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
{
    Schema::create('members', function (Blueprint $table) {
        $table->id();
        $table->string('photo')->nullable();
        $table->string('first_name');
        $table->string('middle_name')->nullable();
        $table->string('last_name');
        $table->string('suffixes')->nullable();
        $table->string('parents_name')->nullable();
        $table->string('immediate_contact')->nullable();
        $table->string('address');
        $table->string('geography')->nullable();
        $table->string('country')->nullable();
        $table->string('phone')->nullable();
        $table->string('email')->nullable();
        $table->string('facebook')->nullable();
        $table->date('birthday')->nullable();
        $table->integer('age')->nullable();
        $table->string('role');
        $table->enum('representative_type', ['Pastor', 'Institution', 'Individual']);
        $table->string('representative_name');
        $table->json('beneficiaries_1')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
