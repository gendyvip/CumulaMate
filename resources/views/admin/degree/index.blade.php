@extends('layouts.admin')

@section('body')


<div class="container-fluid">

  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <i class="fa fa-align-justify"></i> الدرجات والطلاب
      </div>

      @if(Session::has('message'))
      <div class="alert alert-success" role="alert">
        {{ Session::get('message') }}
      </div>
      @endif
      @if ($errors->any())
      <ol>
        @foreach ($errors->all() as $error)
        <li class="alert alert-danger" role="alert">
          {{ $error }}
        </li>
        @endforeach
      </ol>
      @endif
      <div class="card-block">
        <div style="margin-bottom: 10px">
          <a href="{{ route('admin.degree.create') }}" class="edit btn btn-success btn-sm mb-2">أضافة نتيجة</a>
          <a href="{{ route('admin.printDegree') }}" class="edit btn btn-success btn-sm mb-2">تصدير وطباعة</a>
          <a href="#" class="edit btn btn-success btn-sm mb-2" data-toggle="modal" data-target="#exampleModal"
            data-whatever="@mdo">رفع ملف الطلاب اكسيل</a>

        </div>
        <table class="table table-striped table-bordered" id="table_id">
          <thead dir="rtl">
            <tr>
              <th style="text-align: center">الرقم الاكاديمي</th>
              <th style="text-align: center">اسم الطالب</th>
              <th style="text-align: center">
                درجات الاعدادي
                <br>
                الدرجة المئوية
                <br>
                التقدير
              </th>
              <th style="text-align: center">
                درجات الفرقة الاولى
                <br>
                الدرجة المئوية
                <br>
                التقدير
              </th>
              <th style="text-align: center">
                درجات الفرقة التانية
                <br>
                الدرجة المئوية
                <br>
                التقدير
              </th>
              <th style="text-align: center">
                درجات الفرقة التالتة
                <br>
                الدرجة المئوية
                <br>
                التقدير
              </th>
              <th style="text-align: center">
                درجات الفرقة الرابعة
                <br>
                الدرجة المئوية
                <br>
                التقدير
              </th>
              <th style="text-align: center">
                المجموع التراكمي
                <br>
                اجمالي النسبة المئوية
                <br>
                التقدير العام
              </th>
              <th style="text-align: center">اجراء</th>
            </tr>
          </thead>


          <tbody>

            @foreach ($degrees as $degree)
            <tr>
              <td>{{ $degree->acadimic_id}}</td>
              <td>{{ $degree->full_name}}</td>
              <td>
                {{ $degree->level_degree_0}}
                <br>
                {{ number_format((float)$degree->level_percentage_degree_0, 2, '.', '')}} % <br>
                {{ $degree->level_grade_0 }}
              </td>
              <td>
                {{ $degree->level_degree_1}}
                <br>
                {{ number_format((float)$degree->level_percentage_degree_1, 2, '.', '')}} %
                <br>
                {{ $degree->level_grade_1 }}
              </td>
              <td>
                {{ $degree->level_degree_2}}
                <br>
                {{ number_format((float)$degree->level_percentage_degree_2, 2, '.', '')}} % <br>
                {{ $degree->level_grade_2 }}
              </td>
              <td>
                {{ $degree->level_degree_3}}
                <br>
                {{ number_format((float)$degree->level_percentage_degree_3, 2, '.', '')}} % <br>
                {{ $degree->level_grade_3 }}
              </td>
              <td>
                {{ $degree->level_degree_4}}
                <br>
                {{ number_format((float)$degree->level_percentage_degree_4, 2, '.', '')}} % <br>
                {{ $degree->level_grade_4 }}
              </td>
              <td>
                {{ $degree->total_degrees }} <br>
                {{ number_format((float)$degree->total_percentage, 2, '.', '')}} % <br>
                {{ $degree->total_grade }}

              </td>
              <td style="text-align: center">
                <a href="{{ route('admin.degree.edit', $degree->id) }}" class="edit btn btn-success btn-sm">تعديل</a>
                <div class="edit btn btn-sm">
                  <form method="POST" action="{{ route('admin.degree.destroy', $degree->id) }}"
                    onsubmit="return confirm('هل انت متاكد من حذف الأدارة؟')">
                    @csrf
                    @method('DELETE')
                    <button class="edit btn btn-danger btn-sm" type="submit">حذف</button>
                  </form>
                </div>
              </td>
            </tr>

            @endforeach

          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ادراج الطلاب</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.degree-import') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="file" name="student_file" accept=".xlsx,.xls,.csv" required>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
            <button type="submit" class="btn btn-success">رفع الملف</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



@endsection
@push('javascripts')
<script type="text/javascript">
  $(document).ready(function() {
        $('#table_id').DataTable({
          info: false,
        });
        });

</script>
@endpush
