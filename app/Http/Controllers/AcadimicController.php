<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;

use Illuminate\Http\Request;

class AcadimicController extends Controller
{
  public function index()
  {
    return view('welcome');
  }
  public function acadimic(Request $request)
  {
    if (Student::where('acadimic_id', $request->acadimic_id)->exists()) {
      $student = Student::where('acadimic_id', $request->acadimic_id)->first();
      return redirect()->route('acadimic.show', $student->id);
    } else {
      return redirect()->route('home')->with('message', 'حدث خطأ في التعرف على الرقم رجاء التأكد من الرقم الاكاديمي');
    }
  }
  public function show(Student $student)
  {
    return view('student', compact('student'));
  }
}