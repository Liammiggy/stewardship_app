<?php

// database/migrations/xxxx_xx_xx_create_representatives_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepresentativesTable extends Migration
{
    public function up()
    {
        Schema::create('representatives', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('Representative_name');
            $table->string('Phone')->nullable();
            $table->string('Email')->nullable();
            $table->string('Street')->nullable();
            $table->string('Barangay')->nullable();
            $table->string('Municipality')->nullable();
            $table->string('Province')->nullable();
            $table->string('Zipcode')->nullable();
            $table->string('Institution_Name')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('representatives');
    }
}
