<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTacticTechniqueTable extends Migration
{
    public function up()
    {
        Schema::create('tactic_technique', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tactic_id')->constrained();
            $table->foreignId('technique_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tactic_technique');
    }
}
