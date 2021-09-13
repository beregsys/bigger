<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechniquesTable extends Migration
{
    public function up()
    {
        Schema::create('techniques', function (Blueprint $table) {
            $table->id();
            $table->string('mitre_technique_id');
            $table->foreignId('technique_id')->nullable()->references('id')->on('techniques')->cascadeOnDelete();
            $table->string('name');
            $table->text('description');
            $table->timestamp('mitre_created')->nullable();
            $table->timestamp('mitre_modified')->nullable();
            $table->index(['id', 'mitre_technique_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('techniques');
    }
}
