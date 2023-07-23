<x-admin-layout>

  @section('body')
  <style type="text/css">
    .mobile-btn {
      display: none;
    }

    @media (max-width:500px) {
      .mobile-btn {
        display: block;
      }

    }
  </style>

  <div class="container-fluid">

    <div class="animated fadeIn">
      @if(Session::has('message'))
      <div class="alert alert-success" role="alert">
        {{ Session::get('message') }}
      </div>
      @endif
      <a href="{{ route('admin.mobile-app') }}" class="mobile-btn edit btn btn-success mb-2">سحب البيانات من
        الصورة</a>
      <form method="POST" action="{{ Route('admin.degree.update', $degree->id) }}">
        @csrf
        @method('PUT')
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
          <?php $numbers = Session::get('numbers'); ?>
          <div class="card">

            <div class="card-block">

              <div class="form-group mt-3 col-md-12">
                <label>أسم الطالب</label>
                <input type="text" value="{{ $degree->full_name }}" name="full_name" class="form-control"
                  placeholder="أسم الطالب">
              </div>

              <div class="form-group mt-3 col-md-12">
                <label>الرقم الاكاديمي</label>
                <input type="text" value="{{ $degree->acadimic_id }}" name="acadimic_id" class="form-control"
                  placeholder="الرقم الاكاديمي">
              </div>


              <div class="form-group mt-3 col-md-6">
                <label>نتيجة الأعدادي</label>

                @if (isset($numbers[1]))
                <input type="text" value="{{ $numbers[1] }}" name="level_degree_0" class="form-control"
                  placeholder="نتيجة الاعدادي">
                @else
                <input type="text" value="{{ $degree->level_degree_0 }}" name="level_degree_0" class="form-control"
                  placeholder="نتيجة الاعدادي">
                @endif

              </div>

              <div class="form-group mt-3 col-md-6">
                <label>نتيجة الفرقة الاولي</label>

                @if (isset($numbers[2]))
                <input type="text" value="{{ $numbers[2] }}" name="level_degree_1" class="form-control"
                  placeholder="نتيجة الفرقة الاولى">
                @else
                <input type="text" value="{{ $degree->level_degree_1 }}" name="level_degree_1" class="form-control"
                  placeholder="نتيجة الفرقة الاولى">
                @endif


              </div>

              <div class="form-group mt-3 col-md-6">
                <label>نتيجة الفرقة الثانية</label>

                @if (isset($numbers[3]))
                <input type="text" value="{{ $numbers[3] }}" name="level_degree_2" class="form-control"
                  placeholder="نتيجة الفرقة الثانية">
                @else
                <input type="text" value="{{ $degree->level_degree_2 }}" name="level_degree_2" class="form-control"
                  placeholder="نتيجة الفرقة الثانية">
                @endif


              </div>

              <div class="form-group mt-3 col-md-6">
                <label>نتيجة الفرقة الثالثة</label>

                @if (isset($numbers[4]))
                <input type="text" value="{{ $numbers[4] }}" name="level_degree_3" class="form-control"
                  placeholder="نتيجة الفرقة الثالثة">
                @else
                <input type="text" value="{{ $degree->level_degree_3 }}" name="level_degree_3" class="form-control"
                  placeholder="نتيجة الفرقة الثالثة">
                @endif


              </div>

              <div class="form-group mt-3 col-md-6">
                <label>نتيجة الفرقة الرابعة</label>
                @if (isset($numbers[5]))
                <input type="text" value="{{ $numbers[5] }}" name="level_degree_4" class="form-control"
                  placeholder="نتيجة الفرقة الرابعة">
                @else
                <input type="text" value="{{ $degree->level_degree_4 }}" name="level_degree_4" class="form-control"
                  placeholder="نتيجة الفرقة الرابعة">
                @endif

              </div>
              <div class="form-group mt-3 col-md-12">
                <label>سنة الابحاث</label>
                <select id="role" name="level_research" autocomplete="role-name" class="form-control">
                  @if ($degree->level_research == '0')
                  <option value="0" selected>لا يوجد</option>
                  @else
                  <option value="0">لا يوجد</option>
                  @endif
                  @if ($degree->level_research == 'level0')
                  <option value="level0" selected>الاعدادي</option>
                  @else
                  <option value="level0">الاعدادي</option>
                  @endif
                  @if ($degree->level_research == 'level1')
                  <option value="level1" selected>الفرقة اولى</option>
                  @else
                  <option value="level1">الفرقة اولى</option>
                  @endif
                  @if ($degree->level_research == 'level2')
                  <option value="level2" selected>الفرقة تانية</option>
                  @else
                  <option value="level2">الفرقة تانية</option>
                  @endif
                  @if ($degree->level_research == 'level3')
                  <option value="level3" selected>الفرقة تالتة</option>
                  @else
                  <option value="level3">الفرقة تالتة</option>
                  @endif
                  @if ($degree->level_research == 'level4')
                  <option value="level4" selected>الفرقة رابعة</option>
                  @else
                  <option value="level4">الفرقة رابعة</option>
                  @endif
                </select>
              </div>

            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>
                تعديل</button>
            </div>



          </div>
      </form>
    </div>
  </div>
  @endsection
</x-admin-layout>
