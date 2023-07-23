<x-admin-layout>

  @section('body')



  <div class="container-fluid">

    <div class="animated fadeIn">
      <form method="POST" action="{{ Route('admin.degree.store') }}">
        @csrf
        <div class="row">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <div class="card">

            <div class="card-block">

              <div class="form-group mt-3 col-md-12">
                <label>أسم الطالب</label>
                <input type="text" name="full_name" class="form-control" placeholder="أسم الطالب">
              </div>

              <div class="form-group mt-3 col-md-12">
                <label>الرقم الاكاديمي</label>
                <input type="text" name="acadimic_id" class="form-control" placeholder="الرقم الاكاديمي">
              </div>

              <div class="form-group mt-3 col-md-6">
                <label>نتيجة الأعدادي</label>

                <div class="form-group">
                  <input type="text" name="level_degree_0" class="form-control" placeholder="نتيجة الاعدادي">

                </div>

              </div>

              <div class="form-group mt-3 col-md-6">
                <label>نتيجة الفرقة الاولي</label>

                <div class="form-group">
                  <input type="text" name="level_degree_1" class="form-control" placeholder="نتيجة الفرقة الاولى">

                </div>

              </div>

              <div class="form-group mt-3 col-md-6">
                <label>نتيجة الفرقة الثانية</label>

                <div class="form-group">
                  <input type="text" name="level_degree_2" class="form-control" placeholder="نتيجة الفرقة الثانية">

                </div>

              </div>

              <div class="form-group mt-3 col-md-6">
                <label>نتيجة الفرقة الثالثة</label>

                <div class="form-group">
                  <input type="text" name="level_degree_3" class="form-control" placeholder="نتيجة الفرقة الثالثة">

                </div>

              </div>

              <div class="form-group mt-3 col-md-6">
                <label>نتيجة الفرقة الرابعة</label>
                <div class="form-group ">
                  <input type="text" name="level_degree_4" class="form-control" placeholder="نتيجة الفرقة الرابعة">
                </div>
              </div>

              <div class="form-group mt-3 col-md-12">
                <label>سنة الابحاث</label>
                <select id="role" name="level_research" autocomplete="role-name" class="form-control">
                  <option value="0">لا يوجد</option>  
                  <option value="level0">الاعدادي</option>
                  <option value="level1">فرقة اولى</option>
                  <option value="level2">فرقة تانية</option>
                  <option value="level3">فرقة تالتة</option>
                  <option value="level4">فرقة رابعة</option>
                </select>
              </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>
                إضافة</button>
            </div>



          </div>
      </form>
    </div>
  </div>
  @endsection
</x-admin-layout>
