<x-admin-layout>

  @section('body')
  <div class="container">

    <div class="alert alert-danger" style="text-align: center; padding-top: 5%; padding-bottom: 5%;" role="alert">
      <h3>حدث خطأ في التعرف على الرقم الاكاديمي</h3>
      <h4>برجاء التأكد من دقة التصوير والاضاءة واعادة الرفع</h4>
    </div>
    <a href="{{ route('admin.mobile-app') }}" class="mobile-btn edit btn btn-success mb-2">العودة الى سحب الصورة</a>
  </div>

  @endsection
</x-admin-layout>
