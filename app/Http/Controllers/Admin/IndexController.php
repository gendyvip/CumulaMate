<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
  public function index()
  {
    $degrees = Student::all();
    $countDegree = count($degrees);
    $exlantDegree = Student::where('total_grade', 'امتياز')->get();
    $verygoodDegree = Student::where('total_grade', 'جيد جدا')->get();
    $goodDegree = Student::where('total_grade', 'جيد')->get();
    $okDegree = Student::where('total_grade', 'مقبول')->get();
    $weekDegree = Student::where('total_grade', 'ضعيف جدا')->get();

    $user = User::all();
    $countUser = count($user);
    return view('admin.index', compact('countDegree', 'countUser', 'exlantDegree', 'verygoodDegree', 'goodDegree', 'okDegree', 'weekDegree'));
  }
}