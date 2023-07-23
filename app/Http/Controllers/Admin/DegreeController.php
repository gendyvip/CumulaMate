<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Imports\StudentsImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

use App\Models\Student;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Datatables;

class DegreeController extends Controller
{
  public function index()
  {
    $degrees = Student::all();
    return view('admin.degree.index', compact('degrees'));
  }

  public function create()
  {
    return view('admin.degree.create');
  }
  public function getUsersDatatable()
  {
    $data = Student::select('*');

    return Datatables::of($data)
      ->make(true);
  }
  public function store(Request $request)
  {

    $degree_normal = 1500;
    $degree_research = 750;

    $level_degree_0 = $request->level_degree_0;
    $level_degree_1 = $request->level_degree_1;
    $level_degree_2 = $request->level_degree_2;
    $level_degree_3 = $request->level_degree_3;
    $level_degree_4 = $request->level_degree_4;

    $level_percentage_degree_0 = '';
    $level_percentage_degree_1 = '';
    $level_percentage_degree_2 = '';
    $level_percentage_degree_3 = '';
    $level_percentage_degree_4 = '';

    $level_grade_0 = '';
    $level_grade_1 = '';
    $level_grade_2 = '';
    $level_grade_3 = '';
    $level_grade_4 = '';

    $total_degrees = $level_degree_0 + $level_degree_1 + $level_degree_2 + $level_degree_3 + $level_degree_4;

  
    if ($request->level_research == 'level0') {
      $level_percentage_degree_0 = $level_degree_0 / $degree_research * 100;
    } else {
      $level_percentage_degree_0 = $level_degree_0 / $degree_normal * 100;
    }

    if ($request->level_research == 'level1') {
      $level_percentage_degree_1 = $level_degree_1 / $degree_research * 100;
    } else {
      $level_percentage_degree_1 = $level_degree_1 / $degree_normal * 100;
    }

    if ($request->level_research == 'level2') {
      $level_percentage_degree_2 = $level_degree_2 / $degree_research * 100;
    } else {
      $level_percentage_degree_2 = $level_degree_2 / $degree_normal * 100;
    }

    if ($request->level_research == 'level3') {
      $level_percentage_degree_3 = $level_degree_3 / $degree_research * 100;
    } else {
      $level_percentage_degree_3 = $level_degree_3 / $degree_normal * 100;
    }

    if ($request->level_research == 'level4') {
      $level_percentage_degree_4 = $level_degree_4 / $degree_research * 100;
    } else {
      $level_percentage_degree_4 = $level_degree_4 / $degree_normal * 100;
    }


    if ($level_percentage_degree_0 < 50) {
      $level_grade_0 = 'ضعيف جدا';
    } elseif ($level_percentage_degree_0 >= 50 && $level_percentage_degree_0 < 65) {
      $level_grade_0 = 'مقبول';
    } elseif ($level_percentage_degree_0 >= 65 && $level_percentage_degree_0 < 75) {
      $level_grade_0 = 'جيد';
    } elseif ($level_percentage_degree_0 >= 75 && $level_percentage_degree_0 < 85) {
      $level_grade_0 = 'جيد جدا';
    } else {
      $level_grade_0 = 'امتياز';
    }

    if ($level_percentage_degree_1 < 50) {
      $level_grade_1 = 'ضعيف جدا';
    } elseif ($level_percentage_degree_1 >= 50 && $level_percentage_degree_1 < 65) {
      $level_grade_1 = 'مقبول';
    } elseif ($level_percentage_degree_1 >= 65 && $level_percentage_degree_1 < 75) {
      $level_grade_1 = 'جيد';
    } elseif ($level_percentage_degree_1 >= 75 && $level_percentage_degree_1 < 85) {
      $level_grade_1 = 'جيد جدا';
    } else {
      $level_grade_1 = 'امتياز';
    }

    if ($level_percentage_degree_2 < 50) {
      $level_grade_2 = 'ضعيف جدا';
    } elseif ($level_percentage_degree_2 >= 50 && $level_percentage_degree_2 < 65) {
      $level_grade_2 = 'مقبول';
    } elseif ($level_percentage_degree_2 >= 65 && $level_percentage_degree_2 < 75) {
      $level_grade_2 = 'جيد';
    } elseif ($level_percentage_degree_2 >= 75 && $level_percentage_degree_2 < 85) {
      $level_grade_2 = 'جيد جدا';
    } else {
      $level_grade_2 = 'امتياز';
    }

    if ($level_percentage_degree_3 < 50) {
      $level_grade_3 = 'ضعيف جدا';
    } elseif ($level_percentage_degree_3 >= 50 && $level_percentage_degree_3 < 65) {
      $level_grade_3 = 'مقبول';
    } elseif ($level_percentage_degree_3 >= 65 && $level_percentage_degree_3 < 75) {
      $level_grade_3 = 'جيد';
    } elseif ($level_percentage_degree_3 >= 75 && $level_percentage_degree_3 < 85) {
      $level_grade_3 = 'جيد جدا';
    } else {
      $level_grade_3 = 'امتياز';
    }

    if ($level_percentage_degree_4 < 50) {
      $level_grade_4 = 'ضعيف جدا';
    } elseif ($level_percentage_degree_4 >= 50 && $level_percentage_degree_4 < 65) {
      $level_grade_4 = 'مقبول';
    } elseif ($level_percentage_degree_4 >= 65 && $level_percentage_degree_4 < 75) {
      $level_grade_4 = 'جيد';
    } elseif ($level_percentage_degree_4 >= 75 && $level_percentage_degree_4 < 85) {
      $level_grade_4 = 'جيد جدا';
    } else {
      $level_grade_4 = 'امتياز';
    }

    if ($request->level_research == '0') {
      $total_percentage = $total_degrees / 7500 * 100;
    }
    else{
      $total_percentage = $total_degrees / 6750 * 100;
    }  
    $total_grade = '';

    if ($total_percentage < 50) {
      $total_grade = 'ضعيف جدا';
    } elseif ($total_percentage >= 50 && $total_percentage < 65) {
      $total_grade = 'مقبول';
    } elseif ($total_percentage >= 65 && $total_percentage < 75) {
      $total_grade = 'جيد';
    } elseif ($total_percentage >= 75 && $total_percentage < 85) {
      $total_grade = 'جيد جدا';
    } else {
      $total_grade = 'امتياز';
    }

    $validated = $request->validate([
      'full_name' => 'required|string',
      'acadimic_id' => 'required|string',
      'level_degree_0' => 'nullable|string',
      'level_degree_1' => 'nullable|string',
      'level_degree_2' => 'nullable|string',
      'level_degree_3' => 'nullable|string',
      'level_degree_4' => 'nullable|string',
      'level_research' => 'required|string',
    ]);
    Student::create([
      'full_name' => $request->full_name,
      'acadimic_id' => $request->acadimic_id,

      'level_degree_0' => $level_degree_0,
      'level_degree_1' => $level_degree_1,
      'level_degree_2' => $level_degree_2,
      'level_degree_3' => $level_degree_3,
      'level_degree_4' => $level_degree_4,

      'level_percentage_degree_0' => $level_percentage_degree_0,
      'level_percentage_degree_1' => $level_percentage_degree_1,
      'level_percentage_degree_2' => $level_percentage_degree_2,
      'level_percentage_degree_3' => $level_percentage_degree_3,
      'level_percentage_degree_4' => $level_percentage_degree_4,


      'level_grade_0' => $level_grade_0,
      'level_grade_1' => $level_grade_1,
      'level_grade_2' => $level_grade_2,
      'level_grade_3' => $level_grade_3,
      'level_grade_4' => $level_grade_4,

      'total_degrees' => $total_degrees,
      'total_percentage' => $total_percentage,
      'total_grade' => $total_grade,
      'level_research' => $request->level_research,

    ]);
    return to_route('admin.degree.index')->with('message', 'degree Added.');
  }
  public function edit(Student $degree)
  {
    return view('admin.degree.edit', compact('degree'));
  }
  public function update(Request $request, Student $degree)
  {
    $degree_normal = 1500;
    $degree_research = 750;

    $level_degree_0 = $request->level_degree_0;
    $level_degree_1 = $request->level_degree_1;
    $level_degree_2 = $request->level_degree_2;
    $level_degree_3 = $request->level_degree_3;
    $level_degree_4 = $request->level_degree_4;

    $level_percentage_degree_0 = '';
    $level_percentage_degree_1 = '';
    $level_percentage_degree_2 = '';
    $level_percentage_degree_3 = '';
    $level_percentage_degree_4 = '';

    $level_grade_0 = '';
    $level_grade_1 = '';
    $level_grade_2 = '';
    $level_grade_3 = '';
    $level_grade_4 = '';

    $total_degrees = $level_degree_0 + $level_degree_1 + $level_degree_2 + $level_degree_3 + $level_degree_4;

    if ($request->level_research == 'level0') {
      $level_percentage_degree_0 = $level_degree_0 / $degree_research * 100;
    } else {
      $level_percentage_degree_0 = $level_degree_0 / $degree_normal * 100;
    }

    if ($request->level_research == 'level1') {
      $level_percentage_degree_1 = $level_degree_1 / $degree_research * 100;
    } else {
      $level_percentage_degree_1 = $level_degree_1 / $degree_normal * 100;
    }

    if ($request->level_research == 'level2') {
      $level_percentage_degree_2 = $level_degree_2 / $degree_research * 100;
    } else {
      $level_percentage_degree_2 = $level_degree_2 / $degree_normal * 100;
    }

    if ($request->level_research == 'level3') {
      $level_percentage_degree_3 = $level_degree_3 / $degree_research * 100;
    } else {
      $level_percentage_degree_3 = $level_degree_3 / $degree_normal * 100;
    }

    if ($request->level_research == 'level4') {
      $level_percentage_degree_4 = $level_degree_4 / $degree_research * 100;
    } else {
      $level_percentage_degree_4 = $level_degree_4 / $degree_normal * 100;
    }


    if ($level_percentage_degree_0 < 50) {
      $level_grade_0 = 'ضعيف جدا';
    } elseif ($level_percentage_degree_0 >= 50 && $level_percentage_degree_0 < 65) {
      $level_grade_0 = 'مقبول';
    } elseif ($level_percentage_degree_0 >= 65 && $level_percentage_degree_0 < 75) {
      $level_grade_0 = 'جيد';
    } elseif ($level_percentage_degree_0 >= 75 && $level_percentage_degree_0 < 85) {
      $level_grade_0 = 'جيد جدا';
    } else {
      $level_grade_0 = 'امتياز';
    }

    if ($level_percentage_degree_1 < 50) {
      $level_grade_1 = 'ضعيف جدا';
    } elseif ($level_percentage_degree_1 >= 50 && $level_percentage_degree_1 < 65) {
      $level_grade_1 = 'مقبول';
    } elseif ($level_percentage_degree_1 >= 65 && $level_percentage_degree_1 < 75) {
      $level_grade_1 = 'جيد';
    } elseif ($level_percentage_degree_1 >= 75 && $level_percentage_degree_1 < 85) {
      $level_grade_1 = 'جيد جدا';
    } else {
      $level_grade_1 = 'امتياز';
    }

    if ($level_percentage_degree_2 < 50) {
      $level_grade_2 = 'ضعيف جدا';
    } elseif ($level_percentage_degree_2 >= 50 && $level_percentage_degree_2 < 65) {
      $level_grade_2 = 'مقبول';
    } elseif ($level_percentage_degree_2 >= 65 && $level_percentage_degree_2 < 75) {
      $level_grade_2 = 'جيد';
    } elseif ($level_percentage_degree_2 >= 75 && $level_percentage_degree_2 < 85) {
      $level_grade_2 = 'جيد جدا';
    } else {
      $level_grade_2 = 'امتياز';
    }

    if ($level_percentage_degree_3 < 50) {
      $level_grade_3 = 'ضعيف جدا';
    } elseif ($level_percentage_degree_3 >= 50 && $level_percentage_degree_3 < 65) {
      $level_grade_3 = 'مقبول';
    } elseif ($level_percentage_degree_3 >= 65 && $level_percentage_degree_3 < 75) {
      $level_grade_3 = 'جيد';
    } elseif ($level_percentage_degree_3 >= 75 && $level_percentage_degree_3 < 85) {
      $level_grade_3 = 'جيد جدا';
    } else {
      $level_grade_3 = 'امتياز';
    }

    if ($level_percentage_degree_4 < 50) {
      $level_grade_4 = 'ضعيف جدا';
    } elseif ($level_percentage_degree_4 >= 50 && $level_percentage_degree_4 < 65) {
      $level_grade_4 = 'مقبول';
    } elseif ($level_percentage_degree_4 >= 65 && $level_percentage_degree_4 < 75) {
      $level_grade_4 = 'جيد';
    } elseif ($level_percentage_degree_4 >= 75 && $level_percentage_degree_4 < 85) {
      $level_grade_4 = 'جيد جدا';
    } else {
      $level_grade_4 = 'امتياز';
    }
    if ($request->level_research == '0') {
      $total_percentage = $total_degrees / 7500 * 100;
    }
    else{
      $total_percentage = $total_degrees / 6750 * 100;
    } 

    $total_grade = '';

    if ($total_percentage < 50) {
      $total_grade = 'ضعيف جدا';
    } elseif ($total_percentage >= 50 && $total_percentage < 65) {
      $total_grade = 'مقبول';
    } elseif ($total_percentage >= 65 && $total_percentage < 75) {
      $total_grade = 'جيد';
    } elseif ($total_percentage >= 75 && $total_percentage < 85) {
      $total_grade = 'جيد جدا';
    } else {
      $total_grade = 'امتياز';
    }

    $validated = $request->validate([
      'full_name' => 'required|string',
      'acadimic_id' => 'required|string',
      'level_degree_0' => 'nullable|string',
      'level_degree_1' => 'nullable|string',
      'level_degree_2' => 'nullable|string',
      'level_degree_3' => 'nullable|string',
      'level_degree_4' => 'nullable|string',
      'level_research' => 'required|string',

    ]);
    $degree->update([
      'full_name' => $request->full_name,
      'acadimic_id' => $request->acadimic_id,

      'level_degree_0' => $level_degree_0,
      'level_degree_1' => $level_degree_1,
      'level_degree_2' => $level_degree_2,
      'level_degree_3' => $level_degree_3,
      'level_degree_4' => $level_degree_4,

      'level_percentage_degree_0' => $level_percentage_degree_0,
      'level_percentage_degree_1' => $level_percentage_degree_1,
      'level_percentage_degree_2' => $level_percentage_degree_2,
      'level_percentage_degree_3' => $level_percentage_degree_3,
      'level_percentage_degree_4' => $level_percentage_degree_4,


      'level_grade_0' => $level_grade_0,
      'level_grade_1' => $level_grade_1,
      'level_grade_2' => $level_grade_2,
      'level_grade_3' => $level_grade_3,
      'level_grade_4' => $level_grade_4,

      'total_degrees' => $total_degrees,
      'total_percentage' => $total_percentage,
      'total_grade' => $total_grade,
      'level_research' => $request->level_research,

    ]);
    return back()->with('message', 'Degree updated.');
  }

  public function import(Request $request)
  {

    Excel::import(new StudentsImport, $request->file('student_file'));
    return back()->with('message', 'file imported done');
  }

  public function destroy(Student $degree)
  {
    $degree->delete();

    return back()->with('message', 'degree deleted.');
  }
  public function mobile()
  {
    return view('admin.degree.phoneup');
  }
  public function pdfexport()
  {
    $students = Student::all();
    $data = [
      'students' => $students
    ];
    $pdf = PDF::loadView('admin.pdf.students', $data);
    return $pdf->stream('invoice.pdf');
  }
  public function printDegree()
  {
    $students = Student::all();
    return view('admin.pdf.degrees', compact('students'));
  }
  public function image(Request $request)
  {
    $request->validate([
      'image_file' => 'required|image|mimes:png,jpg,jpeg',
      'image_file2' => 'required|image|mimes:png,jpg,jpeg'
    ]);
    $imageName = time() . '.' . $request->image_file->extension();
    $imageName2 = time() + 1 . '.' . $request->image_file2->extension();

    // Public Folder
    $request->image_file->move(public_path('images'), $imageName);
    $request->image_file2->move(public_path('images'), $imageName2);

    $response = Http::withHeaders([
      'content-Type' => 'application/json',
      'Ocp-Apim-Subscription-Key' => '9f0b7221710a4a5e85d4bb8676ba8602'
    ])->post('https://cumulamatefee.cognitiveservices.azure.com/computervision/imageanalysis:analyze?api-version=2023-02-01-preview&features=Read&language=en&gender-neutral-caption=False', [
      'url' => url('images/' . $imageName)
    ]);

    $response2 = Http::withHeaders([
      'content-Type' => 'application/json',
      'Ocp-Apim-Subscription-Key' => '9f0b7221710a4a5e85d4bb8676ba8602'
    ])->post('https://cumulamatefee.cognitiveservices.azure.com/computervision/imageanalysis:analyze?api-version=2023-02-01-preview&features=Read&language=en&gender-neutral-caption=False', [
      'url' => url('images/' . $imageName2)
    ]);

    $res = json_decode($response->body());
    $res2 = json_decode($response2->body());
    $content = array_map('intval', preg_split("/[\s,-]+/", $res->readResult->content));
    $content2 = array_map('intval', preg_split("/[\s,-]+/", $res2->readResult->content));
    $contents = array_filter(array_values($content));
    $contents2 = array_filter(array_values($content2));
    $numbers = [];
    foreach ($contents as $number) {
      if ($number > 200) {
        array_push($numbers, $number);
      }
    }
    foreach ($contents2 as $number) {
      if ($number > 200) {
        array_push($numbers, $number);
      }
    }

    if (Student::where('acadimic_id', $numbers[0])->exists() && $numbers[0] !== null) {
      $student = Student::where('acadimic_id', $numbers[0])->first();
      return redirect()->route('admin.degree.edit', $student->id)->with('numbers', $numbers);
    } else {
      return view('admin.degree.missed');
    }
  }
}