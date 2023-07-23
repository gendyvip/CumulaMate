<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('students', function (Blueprint $table) {
      $table->increments('id');
      $table->string('full_name');
      $table->string('acadimic_id');
      $table->string('level_degree_0')->nullable();
      $table->string('level_degree_1')->nullable();
      $table->string('level_degree_2')->nullable();
      $table->string('level_degree_3')->nullable();
      $table->string('level_degree_4')->nullable();
      $table->string('level_percentage_degree_0')->nullable();
      $table->string('level_percentage_degree_1')->nullable();
      $table->string('level_percentage_degree_2')->nullable();
      $table->string('level_percentage_degree_3')->nullable();
      $table->string('level_percentage_degree_4')->nullable();
      $table->string('level_grade_0')->nullable();
      $table->string('level_grade_1')->nullable();
      $table->string('level_grade_2')->nullable();
      $table->string('level_grade_3')->nullable();
      $table->string('level_grade_4')->nullable();
      $table->string('total_degrees')->nullable();
      $table->string('total_percentage')->nullable();
      $table->string('total_grade')->nullable();
      $table->string('level_research')->nullable();
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('students');
  }
};