<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>كشف رصد المجموع</title>
</head>

<body>
  <div class="text-layout">
    <div class="row">
      <div style="padding-left:350px ; font-weight: bold; class=" center">صفحه 2 من 4</div>
      <div style=" padding-left:320px ; font-size: larger; margin-top: 35px;" class="center"><b>كشف رصد المجموع
          التراكمي للطلاب في امتحان</b></div>
      <div style="padding-right:370px ;" class="right"><b> جامعه المنوفيه</b></div>
    </div>
    <div class="row">
      <inline style=" padding-left: 800px; font-size: larger; class=" center"><b>سنه : 2021/2022</b></inline>
      <inline style=" padding-left: 80px; font-size: larger; class=" center"> <b> دور : مايو</b></inline>
      <inline class="center"> كليه الهندسه الالكترونيه بمنوف</inline>
    </div>
    <div class="row">
      <div style=" padding-left: 800px; font-size: larger; class=" center"><b>هندسه و علوم الحاسبات</b></div>

      <div style=" padding-right: 800px; font-size: larger; class=" center"><b>الفرقه الرابعه(حديث)</b></div>
    </div>
  </div>
  <div>
    <style type="text/css">
      .tg {
        border-collapse: collapse;
        border-spacing: 0;
        margin: 0px auto;
      }

      .tg td {
        border-color: black;
        border-style: solid;
        border-width: 1px;
        font-family: Arial, sans-serif;
        font-size: 14px;
        overflow: hidden;
        padding: 8px 0px;
        word-break: normal;
      }

      .tg th {
        border-color: black;
        border-style: solid;
        border-width: 1px;
        font-family: Arial, sans-serif;
        font-size: 14px;
        font-weight: normal;
        overflow: hidden;
        padding: 8px 0px;
        word-break: normal;
      }

      .tg .tg-18eh {
        border-color: #000000;
        font-weight: bold;
        text-align: center;
        vertical-align: middle;
        border-width: medium;
      }

      .tg .tg-dfoc {
        border-color: #000000;
        font-size: medium;
        font-weight: bold;
        text-align: center;
        vertical-align: middle;
        border-width: medium;
      }

      .tg .tg-bisv {
        border-color: #000000;
        font-size: medium;
        font-weight: bold;
        text-align: center;
        vertical-align: middle;
        border-width: medium;
      }

      .tg .tg-hoy6 {
        border-color: #000000;
        font-size: small;
        font-weight: bold;
        text-align: center;
        vertical-align: middle;
        border-width: medium;
      }

      .text-layout {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100%;
      }

      .row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        margin-bottom: 20px;
      }

      .left {
        flex: 1;
        text-align: left;
      }

      .center {
        flex: 1;
        text-align: center;
      }

      .right {
        flex: 1;
        text-align: right;
      }
    </style>
    <div class="tg-wrap">
      <table class="tg" style="undefined;table-layout: fixed; width: 930px">
        <colgroup>
          <col style="width: 171.88px">
          <col style="width: 65.77px">
          <col style="width: 66.88px">
          <col style="width: 80.88px">
          <col style="width: 79.77px">
          <col style="width: 80.88px">
          <col style="width: 80.88px">
          <col style="width: 80.88px">
          <col style="width: 155.88px">
          <col style="width: 65.888px">
        </colgroup>
        <thead>
          <tr>
            <th class="tg-18eh">ملاحظات</th>
            <th class="tg-18eh">النسبة المئوية التراكمية</th>
            <th class="tg-18eh">المجموع التراكمى</th>
            <th class="tg-18eh">درجات <br>وتقدير الفرقة النهائية</th>
            <th class="tg-18eh">درجات <br>وتقدير ثالثة</th>
            <th class="tg-18eh">درجات <br>وتقدير ثانية</th>
            <th class="tg-18eh">درجات وتقدير أولى</th>
            <th class="tg-18eh">درجات <br>وتقدير اعدادي</th>
            <th class="tg-18eh">اسم الطلب</th>
            <th class="tg-18eh">الرقم الاكديمي</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($students as $student)
          <tr>
            <td class="tg-18eh" rowspan="2"></td>
            <td class="tg-dfoc" rowspan="2">{{ number_format((float)$student->total_percentage, 2, '.', '')}}%</td>
            <td class="tg-bisv" rowspan="2">{{ $student->total_degrees }}</td>
            <td class="tg-dfoc">{{ $student->level_degree_4 }}</td>
            <td class="tg-bisv">{{ $student->level_degree_3 }}</td>
            <td class="tg-dfoc">{{ $student->level_degree_2 }}</td>
            <td class="tg-bisv">{{ $student->level_degree_1 }}</td>
            <td class="tg-dfoc">{{ $student->level_degree_0 }}</td>
            <td class="tg-18eh" rowspan="2">{{ $student->full_name }}</td>
            <td class="tg-hoy6" rowspan="2">{{ $student->acadimic_id }}</td>
          </tr>
          <tr>
            <td class="tg-dfoc">{{ $student->level_grade_4 }}</td>
            <td class="tg-bisv">{{ $student->level_grade_3 }}</td>
            <td class="tg-dfoc">{{ $student->level_grade_2 }}</td>
            <td class="tg-bisv">{{ $student->level_grade_1 }}</td>
            <td class="tg-dfoc">{{ $student->level_grade_0 }}</td>
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
  <script type="text/javascript">
    window.print();
setTimeout(function () {
window.close(); // Replace this line with your own 'afterprint' logic.
}, 2000);
  </script>
</body>

</html>
