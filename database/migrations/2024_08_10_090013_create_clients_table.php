<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->text('description');
            $table->timestamps();
        });

        DB::table('clients')->update([
            'image' => DB::raw("REPLACE(image, 'images/', '')"),
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('clients');
        DB::table('services')->update([
            'image' => DB::raw("CONCAT('images/', image)")
        ]);
    }
}
