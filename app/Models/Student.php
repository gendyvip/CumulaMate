<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
  use HasFactory;
  protected $fillable = [
    'id',
    'full_name',
    'acadimic_id',
    'level_degree_0',
    'level_degree_1',
    'level_degree_2',
    'level_degree_3',
    'level_degree_4',
    'level_percentage_degree_0',
    'level_percentage_degree_1',
    'level_percentage_degree_2',
    'level_percentage_degree_3',
    'level_percentage_degree_4',
    'level_grade_0',
    'level_grade_1',
    'level_grade_2',
    'level_grade_3',
    'level_grade_4',
    'total_degrees',
    'total_percentage',
    'total_grade',
    'level_research',
    'updated_at', 'user_id'
  ];


  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}