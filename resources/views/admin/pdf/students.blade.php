<!DOCTYPE html>
<html lang="ar">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>pdf</title>
</head>

<body>
  <table class="pure-table" dir="rtl">
    <thead>
      <tr style="background-color: #000;">
        <th style="color: #fff">الرقم الاكاديمي</th>
        <th style="color: #fff">أسم الطالب</th>
        <th style="color: #fff">درجات وتقدير اعدادي</th>
        <th style="color: #fff">درجات وتقدير الفرقة الاولى</th>
        <th style="color: #fff">درجات وتقدير الفرقة الثانية</th>
        <th style="color: #fff">درجات وتقدير الفرقة الثالثة</th>
        <th style="color: #fff">درجات وتقدير الفرقة الرابعة</th>
        <th style="color: #fff">المجموع التراكمي</th>
        <th style="color: #fff">النسبة المئوية التراكمية</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($students as $student)
      <tr style="margin-top: 10px">
        <td>{{ $student->acadimic_id}}</td>
        <td>{{ $student->full_name}}</td>
        <td>{{ number_format((float)$student->level_percentage_degree_0, 2, '.', '')}}%<br>{{ $student->level_grade_0
          }}</td>
        <td>{{ number_format((float)$student->level_percentage_degree_1, 2, '.', '')}}%<br>{{ $student->level_grade_1 }}
        </td>
        <td>{{ number_format((float)$student->level_percentage_degree_2, 2, '.', '')}}%<br>{{ $student->level_grade_2 }}
        </td>
        <td>{{ number_format((float)$student->level_percentage_degree_3, 2, '.', '')}}%<br>{{ $student->level_grade_3 }}
        </td>
        <td>{{ number_format((float)$student->level_percentage_degree_4, 2, '.', '')}}%<br>{{ $student->level_grade_4 }}
        </td>
        <td>{{ $student->total_degrees}}</td>
        <td>{{ number_format((float)$student->total_percentage, 2, '.', '')}}%</td>
      </tr>
      @endforeach

    </tbody>
  </table>
</body>

</html>
