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
</head>

<body>

  <div class="container">

    <div class="alert alert-danger" style="text-align: center; padding-top: 5%; padding-bottom: 5%;" role="alert">
      <h4>حدث خطأ في التعرف على الرقم الاكاديمي</h4>
      <h5>برجاء التأكد من الرقم الاكاديمي</h5>
    </div>
    <a href="{{ route('home') }}" class="mobile-btn edit btn btn-success mb-2">العودة الى الصفحة السابقة</a>
  </div>
</body>

</html>
