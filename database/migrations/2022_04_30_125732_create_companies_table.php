<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateCompaniesTable extends Migration
{
   public function up()
   {
      Schema::create('companies', function(Blueprint $table){
         $table->id();
         $table->string('name');
         $table->string('address')->nullable();
         $table->string('website')->nullable();
         $table->string('email');

         $table->foreignId('user_id')->constrained()->onDelete('cascade');
         
         $table->timestamps();
      });
   }

   public function down()
   {
      Schema::dropIfExists('companies');
   }
}