<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTacticsTable extends Migration
{
    public function up()
    {
        Schema::create('tactics', function (Blueprint $table) {
            $table->id();
            $table->string('mitre_tactic_id');
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->timestamp('mitre_created')->nullable();
            $table->timestamp('mitre_modified')->nullable();
            $table->index(['id', 'mitre_tactic_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tactics');
    }
}
