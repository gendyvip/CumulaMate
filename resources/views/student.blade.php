<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>النتائج</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@200;300;400;500;600;700;800&display=swap"
    rel="stylesheet">
  <style type="text/css">
    /*
Table Responsive
===================
Author: https://github.com/pablorgarcia
*/

    @charset "UTF-8";
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

    body {
      font-family: 'Noto Sans Arabic', sans-serif;
      font-weight: 300;
      line-height: 1.42em;
      color: #ffffff;
      background-color: #151428;

    }

    h1 {
      font-size: 3em;
      font-weight: 300;
      line-height: 1em;
      text-align: center;
      color: #4DC3FA;
    }

    h2 {
      font-size: 1em;
      font-weight: 300;
      text-align: center;
      display: block;
      line-height: 1em;
      padding-bottom: 2em;
      color: #FB667A;
    }

    h2 a {
      font-weight: 700;
      text-transform: uppercase;
      color: #FB667A;
      text-decoration: none;
    }

    .blue {
      color: #185875;
    }

    .yellow {
      color: #FFF842;
    }

    .container th h1 {
      font-weight: bold;
      font-size: 1em;
      text-align: right;
      color: #185875;
    }

    .container td {
      font-weight: normal;
      font-size: 1em;
      -webkit-box-shadow: 0 2px 2px -2px #0E1119;
      -moz-box-shadow: 0 2px 2px -2px #0E1119;
      box-shadow: 0 2px 2px -2px #0E1119;
    }

    .container {
      text-align: right;
      overflow: hidden;
      width: 80%;
      margin: 0 auto;
      display: table;
      padding: 2em 0 0 0;
    }

    .container td,
    .container th {
      padding-bottom: 2%;
      padding-top: 2%;
      padding-right: 2%;
    }

    /* Background-color of the odd rows */
    .container tr:nth-child(odd) {
      background-color: #1d1c31;
    }

    /* Background-color of the even rows */
    .container tr:nth-child(even) {
      background-color: #2C3446;
    }

    .container th {
      background-color: #1F2739;
    }

    .container td:first-child {
      color: #ffb500;
    }

    .container tr:hover {
      background-color: #464A52;
      -webkit-box-shadow: 0 6px 6px -6px #0E1119;
      -moz-box-shadow: 0 6px 6px -6px #0E1119;
      box-shadow: 0 6px 6px -6px #0E1119;
    }

    .container td:hover {
      background-color: #FFF842;
      color: #403E10;
      font-weight: bold;

      box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
      transform: translate3d(6px, -6px, 0);

      transition-delay: 0s;
      transition-duration: 0.4s;
      transition-property: all;
      transition-timing-function: line;
    }

    @media (max-width: 800px) {

      .container td:nth-child(4),
      .container th:nth-child(4) {
        display: none;
      }
    }
  </style>
</head>

<body>

  <table class="container" dir="rtl">

    <tbody>
      <tr>
        <td>
          الاسم:
        </td>
        <td>
          {{ $student->full_name }}
        </td>
      </tr>
      <tr>
        <td>
          الرقم الاكاديمي
        </td>
        <td>
          {{ $student->acadimic_id }}
        </td>
      </tr>
      <tr>
        <td>
          درجات  الاعدادي
          <br>
          النسبة المئوية
          <br>
          التقدير العام
        </td>
        <td>
          {{ $student->level_degree_0 }}
          <br>
          {{ number_format((float)$student->level_percentage_degree_0, 2, '.', '')}} % <br>
          {{ $student->level_grade_0 }}
        </td>
      </tr>

      <tr>
        <td>
          درجات الفرقة اولى
          <br>
          النسبة المئوية
          <br>
          التقدير العام
        </td>
        <td>
          {{ $student->level_degree_1 }}
          <br>
          {{ number_format((float)$student->level_percentage_degree_1, 2, '.', '')}} % <br>
          {{ $student->level_grade_1 }}
        </td>
      </tr>

      <tr>
        <td>
          درجات الفرقة تانية
          <br>
          النسبة المئوية
          <br>
          التقدير العام
        </td>
        <td>
          {{ $student->level_degree_2 }}
          <br>
          {{ number_format((float)$student->level_percentage_degree_2, 2, '.', '')}} % <br>
          {{ $student->level_grade_2 }}
        </td>
      </tr>

      <tr>
        <td>
          درجات الفرقة تالتة
          <br>
          النسبة المئوية
          <br>
          التقدير العام
        </td>
        <td>
          {{ $student->level_degree_3 }}
          <br>
          {{ number_format((float)$student->level_percentage_degree_3, 2, '.', '')}} % <br>
          {{ $student->level_grade_3 }}
        </td>
      </tr>

      <tr>
        <td>
          درجات الفرقة رابعة
          <br>
          النسبة المئوية
          <br>
          التقدير العام
        </td>
        <td>
          {{ $student->level_degree_4 }}
          <br>
          {{ number_format((float)$student->level_percentage_degree_4, 2, '.', '')}} % <br>
          {{ $student->level_grade_4 }}
        </td>
      </tr>
      <tr>
        <td>
          اجمالي الدرجات لكل السنوات
          <br>
          النسبة المئوية لكل السنوات
          <br>
          التقدير العام لكل السنوات
        </td>
        <td>
          {{ $student->total_degrees }}
          <br>
          {{ number_format((float)$student->total_percentage, 2, '.', '')}} % <br>
          {{ $student->total_grade }}
        </td>
      </tr>
    </tbody>
  </table>
</body>

</html>
