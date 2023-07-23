<x-admin-layout>
  @section('body')
  <div class="container" style="height: 100%">

    <div class="container-fluid">

      <div class="animated fadeIn">
        <div class="row">
          <div class="col-sm-12 col-lg-6">
            <div class="card card-inverse card-primary">
              <div class="card-block p-b-0">
                <h4 class="m-b-0">{{ $countDegree }}</h4>
                <p>الطلاب</p>
              </div>
              <div class="chart-wrapper p-x-1" style="height:70px;">
                <canvas id="card-chart1" class="chart" height="70"></canvas>
              </div>
            </div>
          </div>
          <!--/col-->

          <div class="col-sm-12 col-lg-6">
            <div class="card card-inverse card-info">
              <div class="card-block p-b-0">
                <button type="button" class="btn btn-transparent active p-a-0 pull-left">
                  <i class="icon-location-pin"></i>
                </button>
                <h4 class="m-b-0">{{ $countUser }}</h4>
                <p>المستخدمين</p>
              </div>
              <div class="chart-wrapper p-x-1" style="height:70px;">
                <canvas id="card-chart2" class="chart" height="70"></canvas>
              </div>
            </div>
          </div>
          <!--/col-->
          <div class="col-sm-6 col-lg-6">
            <div class="card card-inverse card-success">
              <div class="card-block p-b-0">
                <div class="btn-group pull-left">

                </div>
                <h4 class="m-b-0">{{ count($exlantDegree) }}</h4>
                <p>الطلاب الحاصلين على امتياز</p>
              </div>
              <div class="chart-wrapper" style="height:70px;">
              </div>
            </div>
          </div>

          <!--/col-->
          <div class="col-sm-6 col-lg-6">
            <div class="card card-inverse card-primary">
              <div class="card-block p-b-0">
                <div class="btn-group pull-left">

                </div>
                <h4 class="m-b-0">{{ count($verygoodDegree) }}</h4>
                <p>الطلاب الحاصلين على جيد جدا</p>
              </div>
              <div class="chart-wrapper" style="height:70px;">
              </div>
            </div>
          </div>

          <!--/col-->
          <div class="col-sm-6 col-lg-4">
            <div class="card card-inverse card-info">
              <div class="card-block p-b-0">
                <div class="btn-group pull-left">

                </div>
                <h4 class="m-b-0">{{ count($goodDegree) }}</h4>
                <p>الطلاب الحاصلين على جيد</p>
              </div>
              <div class="chart-wrapper" style="height:70px;">
              </div>
            </div>
          </div>

          <!--/col-->
          <div class="col-sm-6 col-lg-4">
            <div class="card card-inverse card-warning">
              <div class="card-block p-b-0">
                <div class="btn-group pull-left">

                </div>
                <h4 class="m-b-0">{{ count($okDegree) }}</h4>
                <p>الطلاب الحاصلين على مقبول</p>
              </div>
              <div class="chart-wrapper" style="height:70px;">
              </div>
            </div>
          </div>

          <!--/col-->
          <div class="col-sm-6 col-lg-4">
            <div class="card card-inverse card-danger">
              <div class="card-block p-b-0">
                <div class="btn-group pull-left">

                </div>
                <h4 class="m-b-0">{{ count($weekDegree) }}</h4>
                <p>الطلاب الحاصلين على ضعيف جدا</p>
              </div>
              <div class="chart-wrapper" style="height:70px;">
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>
  @endsection
</x-admin-layout>
