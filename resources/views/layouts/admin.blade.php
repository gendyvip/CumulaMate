<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0;">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>CumulaMate</title>
  <!-- Icons -->
  <link href="{{ asset('adminassets/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('adminassets/css/simple-line-icons.css') }}" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@200;300;400;500;600;700;800&display=swap"
    rel="stylesheet">
  <!-- Main styles for this application -->
  <link href="{{ asset('adminassets/dest/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
  <style type="text/css">
    .main {
      font-family: 'Noto Sans Arabic', sans-serif;
    }

    .sidephone {
      display: block;
    }

    @media (max-width:500px) {
      .sidephone {
        display: none;
      }

    }

    th {
      text-align: center
    }

    td {
      text-align: center
    }
  </style>
</head>

<body class="navbar-fixed sidebar-nav fixed-nav">
  <header class="navbar sidephone">
    <div class="container-fluid">
      <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
      <a class="navbar-brand" href="#" style="background-image: url('#');">
        <img src="{{ asset('adminassets/img/fee_ar.png') }}" alt="" height="40">
      </a>
      <ul class="nav navbar-nav hidden-md-down">
        <li class="nav-item">
          <a class="nav-link navbar-toggler layout-toggler" href="#">&#9776;</a>
        </li>

      </ul>
      <ul class="nav navbar-nav pull-left hidden-md-down">

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
            aria-haspopup="true" aria-expanded="false">
            <span class="hidden-md-down">الاعدادات</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ route('admin.users.edit', auth()->user()) }}"><i class="fa fa-user"></i>
              اعدادات المستخدم</a>
            <div class="divider"></div>

            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              تسجيل الخروج
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>

          </div>
        </li>




      </ul>
    </div>
  </header>
  @include('layouts.sidebar')
  <!-- Main content -->
  <main class="main">
    @yield('body')
  </main>



  <footer class="footer">
    <h4 style="text-align: center; margin-top:0.5em" target="_blank">جميع الحقوق محفوظة لدى طلاب جامعة المنوفية<span
        class="text-left">
        &copy; 2023.
      </span></h4>
  </footer>
  <!-- Bootstrap and necessary plugins -->
  <script src="{{ asset('adminassets/js/libs/jquery.min.js') }}"></script>
  <script src="{{ asset('adminassets/js/libs/tether.min.js') }}"></script>
  <script src="{{ asset('adminassets/js/libs/bootstrap.min.js') }}"></script>
  <script src="{{ asset('adminassets/js/libs/pace.min.js') }}"></script>

  <!-- Plugins and scripts required by all views -->
  <script src="{{ asset('adminassets/js/libs/Chart.min.js') }}"></script>

  <!-- CoreUI main scripts -->
  <script src="{{ asset('adminassets/js/app.js') }}"></script>

  <!-- Plugins and scripts required by this views -->
  <!-- Custom scripts required by this view -->
  <script src="{{ asset('adminassets/js/views/main.js') }}"></script>

  <!-- Grunt watch plugin -->
  <script src="{{ asset('adminassets') }}/livereload.js"></script>

  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
  <script>
    var allEditors = document.querySelectorAll('#editor');
        for (var i = 0; i < allEditors.length; ++i) {
            ClassicEditor.create(allEditors[i]);
        }

        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
  </script>


  @stack('javascripts')
</body>

</html>
