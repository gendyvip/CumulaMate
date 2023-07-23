<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>رفع الصورة</title>
  <style type="text/css">
    body {
      font-family: sans-serif;
      background-color: #eeeeee;
      max-width: 67vw;
    }

    .container {
      max-width: 67vw;
      position: relative;
    }

    .file-upload {
      margin-top: 35%;
      margin-left: 12%;
      background-color: #ffffff;
      width: 100%;
      padding: 20px;
    }

    .file-upload2 {
      margin-top: 35%;
      margin-left: 12%;
      background-color: #ffffff;
      width: 100vw;
      padding: 20px;
    }

    .file-upload-btn {
      width: 100%;
      margin: 0;
      color: #fff;
      background: #1FB264;
      border: none;
      padding: 10px;
      border-radius: 4px;
      border-bottom: 4px solid #15824B;
      transition: all .2s ease;
      outline: none;
      text-transform: uppercase;
      font-weight: 700;
      font-size: 24px;
    }

    .file-upload-btn:hover {
      background: #1AA059;
      color: #ffffff;
      transition: all .2s ease;
      cursor: pointer;
    }

    .file-upload-btn:active {
      border: 0;
      transition: all .2s ease;
    }

    .file-upload-btn2 {
      width: 100%;
      margin: 0;
      color: #fff;
      background: #1FB264;
      border: none;
      padding: 10px;
      border-radius: 4px;
      border-bottom: 4px solid #15824B;
      transition: all .2s ease;
      outline: none;
      text-transform: uppercase;
      font-weight: 700;
    }

    .file-upload-btn2:hover {
      background: #1AA059;
      color: #ffffff;
      transition: all .2s ease;
      cursor: pointer;
    }

    .file-upload-btn2:active {
      border: 0;
      transition: all .2s ease;
    }

    .file-upload-content {
      display: none;
      text-align: center;
    }

    .file-upload-content2 {
      display: none;
      text-align: center;
    }

    .file-upload-input {
      position: absolute;
      margin: 0;
      padding: 0;
      width: 100%;
      height: 100%;
      outline: none;
      opacity: 0;
      cursor: pointer;
    }

    .file-upload-input2 {
      position: absolute;
      margin: 0;
      padding: 0;
      width: 100%;
      height: 100%;
      outline: none;
      opacity: 0;
      cursor: pointer;
    }

    .image-upload-wrap {
      margin-top: 20px;
      border: 4px dashed #1FB264;
      position: relative;
    }

    .image-upload-wrap2 {
      margin-top: 20px;
      border: 4px dashed #1FB264;
      position: relative;
    }

    .image-dropping,
    .image-upload-wrap:hover {
      background-color: #1FB264;
      border: 4px dashed #ffffff;
    }

    .image-dropping2,
    .image-upload-wrap2:hover {
      background-color: #1FB264;
      border: 4px dashed #ffffff;
    }

    .image-title-wrap {
      padding: 0 15px 15px 15px;
      color: #222;
    }

    .image-title-wrap2 {
      padding: 0 15px 15px 15px;
      color: #222;
    }

    .drag-text {
      text-align: center;
    }

    .drag-text h3 {
      font-weight: 500;
      font-size: 30px;
      text-transform: uppercase;
      color: #15824B;
      padding: 60px 5px;
    }

    .file-upload-image {
      max-height: 200px;
      max-width: 200px;
      margin: auto;
      padding: 20px;
    }

    .file-upload-image2 {
      max-height: 200px;
      max-width: 200px;
      margin: auto;
      padding: 20px;
    }

    .remove-image {
      width: 200px;
      margin: 0;
      color: #fff;
      background: #cd4535;
      border: none;
      padding: 10px;
      border-radius: 4px;
      border-bottom: 4px solid #b02818;
      transition: all .2s ease;
      outline: none;
      text-transform: uppercase;
      font-weight: 700;
    }

    .remove-image2 {
      width: 200px;
      margin: 0;
      color: #fff;
      background: #cd4535;
      border: none;
      padding: 10px;
      border-radius: 4px;
      border-bottom: 4px solid #b02818;
      transition: all .2s ease;
      outline: none;
      text-transform: uppercase;
      font-weight: 700;
    }

    .remove-image:hover {
      background: #c13b2a;
      color: #ffffff;
      transition: all .2s ease;
      cursor: pointer;
    }

    .remove-image:active {
      border: 0;
      transition: all .2s ease;
    }

    .remove-image2:hover {
      background: #c13b2a;
      color: #ffffff;
      transition: all .2s ease;
      cursor: pointer;
    }

    .remove-image2:active {
      border: 0;
      transition: all .2s ease;
    }
  </style>
</head>

<body>
  <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <div class="container">
    <div class="file-upload">
      <form action="{{ route('admin.image-scan') }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">اضافة او
          تصوير
          الصورة</button> --}}

        <div class="image-upload-wrap">
          <input class="file-upload-input" type="file" name="image_file" required accept="image/*" capture="user"
            onchange="readURL(this);" />
          <div class="drag-text">
            <h3>اضغط هنا
              لاضافة او تصوير الصورة الاولى
            </h3>
          </div>
        </div>
        <div class="file-upload-content">
          <img class="file-upload-image" src="#" alt="your image" />
          <div class="image-title-wrap">
            <button style="margin-top: 10px" type="button" onclick="removeUpload()" class="remove-image">Remove <span
                class="image-title">Uploaded
                Image</span></button>
          </div>
        </div>

        <div class="image-upload-wrap2">
          <input class="file-upload-input2" type="file" name="image_file2" required accept="image/*" capture="user"
            onchange="readURL2(this);" />
          <div class="drag-text">
            <h3>اضغط هنا لاضافة او تصوير الصورة الثانية</h3>
          </div>
        </div>
        <div class="file-upload-content2">
          <img class="file-upload-image2" src="#" alt="your image" />
          <div class="image-title-wrap2">
            <button style="margin-top: 10px" type="button" onclick="removeUpload2()" class="remove-image2">Remove <span
                class="image-title2">Uploaded
                Image</span></button>
          </div>
        </div>
        <button class="file-upload-btn" style="margin-top: 10px" type="submit">تأكيد الصور</button>
      </form>
    </div>

  </div>
  <script type="text/javascript">
    function readURL(input) {
  if (input.files && input.files[0]) {

  var reader = new FileReader();

  reader.onload = function(e) {
  $('.image-upload-wrap').hide();

  $('.file-upload-image').attr('src', e.target.result);
  $('.file-upload-content').show();

  $('.image-title').html(input.files[0].name);
  };

  reader.readAsDataURL(input.files[0]);

  } else {
  removeUpload();
  }
  }
function readURL2(input) {
    if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
    $('.image-upload-wrap2').hide();

    $('.file-upload-image2').attr('src', e.target.result);
    $('.file-upload-content2').show();

    $('.image-title2').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

    } else {
    removeUpload2();
    }
    }
  function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
  }
  $('.image-upload-wrap').bind('dragover', function () {
  $('.image-upload-wrap').addClass('image-dropping');
  });
  $('.image-upload-wrap').bind('dragleave', function () {
  $('.image-upload-wrap').removeClass('image-dropping');
  });

  function removeUpload2() {
    $('.file-upload-input2').replaceWith($('.file-upload-input2').clone());
    $('.file-upload-content2').hide();
    $('.image-upload-wrap2').show();
    }
    $('.image-upload-wrap2').bind('dragover', function () {
    $('.image-upload-wrap2').addClass('image-dropping2');
    });
    $('.image-upload-wrap2').bind('dragleave', function () {
    $('.image-upload-wrap2').removeClass('image-dropping2');
    });
  </script>
</body>

</html>
